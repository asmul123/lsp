<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Skema extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mskema');
		$this->load->model('Masesor');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		if ($id == "1") {
			$data['dataskema'] = $this->Mskema->getskema();
		} else {
			$idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
			$data['dataskema'] = $this->Mskema->getskemaasesor($idasesor);
		}
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema', $data);
		$this->load->view('template/footer');
	}

	public function detail($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema-detail', $data);
		$this->load->view('template/footer');
	}

	public function unit($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_unit', $data);
		$this->load->view('template/footer');
	}

	public function elemen($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataunit'] = $this->Mskema->getunitdetail($idunit);
		$data['dataelemen'] = $this->Mskema->getelemen($idunit);
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_elemen', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema-add', $data);
		$this->load->view('template/footer');
	}

	public function add_process()
	{
		$nomor_skema = $this->input->post('nomor_skema', true);
		$judul_skema = $this->input->post('judul_skema', true);
		$jenis_skema = $this->input->post('jenis_skema', true);
		$config['upload_path']          = './assets/skema/';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 5120;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_skema')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
			$file_skema = "";
		} else {
			$file_skema = $this->upload->data('file_name');
		}
		$data = array(
			'nomor_skema' => $nomor_skema,
			'judul_skema' => $judul_skema,
			'jenis_skema' => $jenis_skema,
			'file_skema' => $file_skema
		);
		$this->Mskema->addskema($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Skema.
																</div>');
		redirect(base_url('skema'));
	}


	public function hapus($id)
	{

		$this->Mskema->hapusfile($id);
		$this->Mskema->delskema($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Skema.
                                        		</div>');
		redirect(base_url('skema'));
	}

	public function ubah($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema-edit', $data);
		$this->load->view('template/footer');
	}


	public function edt_process()
	{
		$id = $this->input->post('id', true);
		$file_skema_lama = $this->input->post('file_skema_lama', true);
		$nomor_skema = $this->input->post('nomor_skema', true);
		$judul_skema = $this->input->post('judul_skema', true);
		$jenis_skema = $this->input->post('jenis_skema', true);
		$config['upload_path']          = './assets/skema/';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 5120;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_skema')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
			$file_skema = $file_skema_lama;
		} else {
			$file_skema = $this->upload->data('file_name');
			unlink('./assets/skema/' . $file_skema_lama);
		}
		$data = array(
			'nomor_skema' => $nomor_skema,
			'judul_skema' => $judul_skema,
			'jenis_skema' => $jenis_skema,
			'file_skema' => $file_skema
		);
		$this->Mskema->editskema($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Merubah Data Skema.
																</div>');
		redirect(base_url('skema'));
	}

	public function export()
	{

		$this->db->select('*');
		$asesor =	$this->db->get('tb_asesor')->result();
		// var_dump($siswa);
		// die();
		// $this->db->query('tb_siswa', ['id_kelas' => $id])->result();
		try {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getProperties()
				->setCreator("HOSTERWEB")
				->setLastModifiedBy("HOSTERWEB")
				->setTitle("SILSP")
				->setSubject("EXCEL ASESOR")
				->setDescription(
					"Data Asesor LSP P1 SMKN 4 GARUT"
				)
				->setKeywords("HOSTERWEB")
				->setCategory("excel");
			$spreadsheet->setActiveSheetIndex(0);
			$sheet->setCellValue('A1', 'DATA ASESOR ');
			$sheet->mergeCells('A1:C1');

			$sheet->setCellValue('A2', 'LSP P1 SMK NEGERI 4 GARUT ');
			$sheet->mergeCells('A2:C2');

			$sheet->setCellValue('A3', '');
			$sheet->mergeCells('A3:C3');

			$sheet->setCellValue('A4', 'No');
			$sheet->setCellValue('B4', 'No MET');
			$sheet->setCellValue('C4', 'Nama Asesor');

			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);

			$x = 5;
			$no = 1;
			foreach ($asesor as $row) {
				$sheet->setCellValue('A' . $x, $no++);
				$sheet->setCellValue('B' . $x, $row->no_met);
				$sheet->setCellValue('C' . $x, $row->nama);
				$x++;
			}
			$styleArray = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'allBorders' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['argb' => '00000000'],
					],
				],

			];
			$row = $x - 1;
			$sheet->getStyle('A4:C' . $row)->applyFromArray($styleArray);

			$writer = new Xlsx($spreadsheet);
			$filename = 'Data Asesor ' . time();

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}
	}

	public function import()
	{
		$id = $this->session->userdata('tipeuser');

		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_asesor/v_asesor-import', $data);
		$this->load->view('template/footer');
	}

	public function prosesimport()
	{

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
			$fileName = time() . $_FILES['file']['name'];
			$config['upload_path'] = './assets/excel/'; //buat folder dengan nama assets di root folder
			$config['file_name'] = str_replace(" ", "", $fileName);
			$config['allowed_types'] = 'xls|xlsx|csv';
			$config['max_size'] = 10000;
			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> <br>
                                                            <ul>															
                                                                <li>' . $this->upload->display_errors() . '</li>															
                                                            </ul>						
                                                        </div>');
				redirect(base_url('asesor/import'));
			}
			$inputFileName = './assets/excel/' . $config['file_name'];

			if ('csv' == $extension) {
				$reader = new Csv();
			} else if ('xlsx' == $extension) {
				$reader = new Xlsx();
			} else if ('xls' == $extension) {
				$reader = new Xls();
			}

			try {
				$spreadsheet = $reader->load($inputFileName);
				$sheetData = $spreadsheet->getActiveSheet()->toArray();
				$sheetRows = $spreadsheet->getActiveSheet()->getHighestRow();
				$gagal = 0;
				$berhasil = 0;
				if (intval($sheetRows) >= 3) {
					for ($i = 3; $i < count($sheetData); $i++) {
						$cekNomet = $this->Masesor->cekNomet($sheetData[$i][0]);
						$cekUsername = $this->Masesor->cekUsername($sheetData[$i][2]);
						if ($cekNomet == 'kosong') {
							if ($cekUsername == 'kosong') {
								$data2 = array(
									'username' => $sheetData[$i][2],
									'nama' => $sheetData[$i][1],
									'password' => md5($sheetData[$i][3]),
									'user_level' => '2'
								);
								$this->Masesor->adduser($data2);
								$user = $this->Masesor->cekIdUser($username);
								$data = array(
									'no_met' => $sheetData[$i][0],
									'nama' => $sheetData[$i][1],
									'foto' => 'noimage.png',
									'id_user' => $user->id
								);
								$this->Masesor->addasesor($data);
								$berhasil++;
							} else {
								$gagal++;
							}
						} else {
							$gagal++;
						}
					}
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                                <strong>Perhatian!</strong> File excel anda kosong.
                                                            </div>');
					redirect(base_url('asesor/import'));
				}
			} catch (Exception $e) {
				var_dump($e);
			}
		} else {
			unlink($inputFileName);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
														<strong>Status Import!</strong> Berhasil : ' . $berhasil . ' data, Gagal : ' . $gagal . ' data
													</div>');
			redirect('asesor');
		}
	}

	public function template()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'TEMPLATE ASESOR');
		$sheet->mergeCells('A1:D1');

		$sheet->setCellValue('A2', 'No MET');
		$sheet->setCellValue('B2', 'Nama Lengkap');
		$sheet->setCellValue('C2', 'Nama Pengguna');
		$sheet->setCellValue('D2', 'Kata Sandi');

		$styleArray = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => '00000000'],
				],
			],

		];
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getStyle('A2:D3')->applyFromArray($styleArray);

		$writer = new Xlsx($spreadsheet);
		$filename = "Template Data Asesor";

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function tambah_unit($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_unit-add', $data);
		$this->load->view('template/footer');
	}

	public function add_unit_process()
	{
		$id_skema = $this->input->post('id_skema', true);
		$kode_unit = $this->input->post('kode_unit', true);
		$judul_unit = $this->input->post('judul_unit', true);
		$jenis_standar = $this->input->post('jenis_standar', true);
		$data = array(
			'kode_unit' => $kode_unit,
			'judul_unit' => $judul_unit,
			'jenis_standar' => $jenis_standar,
			'id_skema' => $id_skema
		);
		$this->Mskema->addunitskema($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Unit Skema.
																</div>');
		redirect(base_url('skema/unit/' . $id_skema));
	}

	public function ubah_unit($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataunit'] = $this->Mskema->getunitdetail($idunit);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_unit-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_unit_process()
	{
		$id = $this->input->post('id', true);
		$unitdet = $this->Mskema->getunitdetail($id);
		$kode_unit = $this->input->post('kode_unit', true);
		$judul_unit = $this->input->post('judul_unit', true);
		$jenis_standar = $this->input->post('jenis_standar', true);
		$data = array(
			'kode_unit' => $kode_unit,
			'judul_unit' => $judul_unit,
			'jenis_standar' => $jenis_standar
		);
		$this->Mskema->editunitskema($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																	<strong>Sukses!</strong> Berhasil Merubah Data Unit Skema.
																	</div>');
		redirect(base_url('skema/unit/' . $unitdet['id_skema']));
	}

	public function hapus_unit($id)
	{
		$unitdet = $this->Mskema->getunitdetail($id);
		$this->Mskema->delunitskema($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
			<strong>Sukses!</strong> Berhasil Menghapus Data Unit Skema.
													</div>');
		redirect(base_url('skema/unit/' . $unitdet['id_skema']));
	}

	public function tambah_elemen($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataunit'] = $this->Mskema->getunitdetail($idunit);
		$data['dataelemen'] = $this->Mskema->getelemen($idunit);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_elemen-add', $data);
		$this->load->view('template/footer');
	}

	public function add_elemen_process()
	{
		$id_unit = $this->input->post('id_unit', true);
		$elemen = $this->input->post('elemen', true);
		$urutan = $this->input->post('urutan', true);
		$data = array(
			'elemen' => $elemen,
			'urutan' => $urutan,
			'id_unit' => $id_unit
		);
		$this->Mskema->addelemenskema($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																	<strong>Sukses!</strong> Berhasil Menambahkan Data Elemen.
																	</div>');
		redirect(base_url('skema/elemen/' . $id_unit));
	}

	public function ubah_elemen($idelemen)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataelemen'] = $this->Mskema->getelemendetail($idelemen);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_elemen-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_elemen_process()
	{
		$id = $this->input->post('id', true);
		$elemendet = $this->Mskema->getelemendetail($id);
		$elemen = $this->input->post('elemen', true);
		$urutan = $this->input->post('urutan', true);
		$data = array(
			'elemen' => $elemen,
			'urutan' => $urutan
		);
		$this->Mskema->editelemenskema($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																		<strong>Sukses!</strong> Berhasil Merubah Data Elemen.
																		</div>');
		redirect(base_url('skema/elemen/' . $elemendet['id_unit']));
	}

	public function hapus_elemen($id)
	{
		$elemendet = $this->Mskema->getelemendetail($id);
		$this->Mskema->delelemenskema($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Menghapus Data Elemen.
														</div>');
		redirect(base_url('skema/elemen/' . $elemendet['id_unit']));
	}

	public function tambah_kuk($idelemen)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataelemen'] = $this->Mskema->getelemendetail($idelemen);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_kuk-add', $data);
		$this->load->view('template/footer');
	}

	public function add_kuk_process()
	{
		$id_elemen = $this->input->post('id', true);
		$id_unit = $this->input->post('id_unit', true);
		$kuk = $this->input->post('kuk', true);
		$kuk_aktif = $this->input->post('kuk_aktif', true);
		$urutan = $this->input->post('urutan', true);
		$data = array(
			'kuk' => $kuk,
			'kuk_aktif' => $kuk_aktif,
			'urutan' => $urutan,
			'id_elemen' => $id_elemen
		);
		$this->Mskema->addkukskema($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																		<strong>Sukses!</strong> Berhasil Menambahkan Data KUK.
																		</div>');
		redirect(base_url('skema/elemen/' . $id_unit));
	}

	public function ubah_kuk($idkuk)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datakuk'] = $this->Mskema->getkukdetail($idkuk);
		$data['dataelemen'] = $this->Mskema->getelemendetail($data['datakuk']['id_elemen']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_skema/v_skema_kuk-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_kuk_process()
	{
		$id = $this->input->post('id', true);
		$id_unit = $this->input->post('id_unit', true);
		$kuk = $this->input->post('kuk', true);
		$kuk_aktif = $this->input->post('kuk_aktif', true);
		$urutan = $this->input->post('urutan', true);
		$data = array(
			'kuk' => $kuk,
			'kuk_aktif' => $kuk_aktif,
			'urutan' => $urutan
		);
		$this->Mskema->editkukskema($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																			<strong>Sukses!</strong> Berhasil Mengubah Data KUK.
																			</div>');
		redirect(base_url('skema/elemen/' . $id_unit));
	}

	public function hapus_kuk($id)
	{
		$kukdet = $this->Mskema->getkukdetail($id);
		$elemendet = $this->Mskema->getelemendetail($kukdet['id_elemen']);
		$this->Mskema->delkukskema($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Menghapus Data KUK.
															</div>');
		redirect(base_url('skema/elemen/' . $elemendet['id_unit']));
	}

	public function download($id)
	{
		$skema = $this->Mskema->getskemadetail($id);
		redirect(base_url('assets/skema/') . $skema['file_skema']);
	}
}
