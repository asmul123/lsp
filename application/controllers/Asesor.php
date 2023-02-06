<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Asesor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Masesor');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataasesor'] = $this->Masesor->getasesor();
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_asesor/v_asesor', $data);
		$this->load->view('template/footer');
	}

	public function detail($idasesor)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPathDet(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_asesor/v_asesor-detail', $data);
		$this->load->view('template/footer');
		// print_r($this->M_Siswa->getsiswadetail($nis));
	}

	public function tambah()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_asesor/v_asesor-add', $data);
		$this->load->view('template/footer');
	}

	public function add_process()
	{
		$no_met = $this->input->post('no_met', true);
		$cekNomet = $this->Masesor->cekNomet($this->input->post('no_met', true));
		$nama = $this->input->post('nama', true);
		$username = $this->input->post('username', true);
		$cekUsername = $this->Masesor->cekUsername($this->input->post('username', true));
		$password = $this->input->post('password', true);
		$password2 = $this->input->post('password2', true);
		if ($password === $password2) {
			$password = md5($password);
		} else {
			$password = "tidaksesuai";
		}

		if ($cekNomet == 'kosong') {
			if ($cekUsername == 'kosong') {
				if ($password != 'tidaksesuai') {
					$config['upload_path']          = './assets/img/asesor/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 1024;
					$config['max_width']            = 6000;
					$config['max_height']           = 6000;
					$config['overwrite'] = TRUE;
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('foto')) {
						$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
						$foto = "noimage.png";
					} else {
						$foto = $this->upload->data('file_name');
					}
					$data2 = array(
						'username' => $username,
						'nama' => $nama,
						'password' => $password,
						'user_level' => '2'
					);
					$this->Masesor->adduser($data2);
					$user = $this->Masesor->cekIdUser($username);
					$data = array(
						'no_met' => $no_met,
						'nama' => $nama,
						'foto' => $foto,
						'id_user' => $user->id
					);
					$this->Masesor->addasesor($data);
					$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Asesor.
																</div>');
					redirect(base_url('asesor'));
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert">
		                                            		<strong>Gagal!</strong> Mohon periksa kembali Konfirmasi Kata Sandi.
		                                        		</div>');
					redirect(base_url('asesor/tambah'));
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
		                                            		<strong>Gagal!</strong> Nama Pengguna sudah ada, Coba lagi.
		                                        		</div>');
				redirect(base_url('asesor/tambah'));
			}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
			<strong>Gagal!</strong> Sudah Ada Asesor yang mempunyai No MET yang sama.
			</div>');
			redirect(base_url('asesor/tambah'));
		}
	}

	public function hapus($id, $iduser)
	{

		$this->Masesor->hapusfoto($id);
		$this->Masesor->delasesor($id);
		$this->Masesor->deluser($iduser);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Asesor.
                                        		</div>');
		redirect(base_url('asesor'));
	}

	public function ubah($idasesor)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['id_asesor'] = $idasesor;
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Asesor'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_asesor/v_asesor-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_process()
	{
		$no_met = $this->input->post('no_met', true);
		$foto_lama = $this->input->post('foto_lama', true);
		$id_asesor = $this->input->post('id', true);
		$id_user = $this->input->post('id_user', true);
		$cekNomet = $this->Masesor->cekNometU($no_met, $id_asesor);
		$nama = $this->input->post('nama', true);
		$username = $this->input->post('username', true);
		$cekUsername = $this->Masesor->cekUsernameU($username, $id_user);
		$password = $this->input->post('password', true);
		$password2 = $this->input->post('password2', true);
		if ($password === $password2) {
			$password = md5($password);
		} else {
			$password = "tidaksesuai";
		}

		if ($cekNomet == 'kosong') {
			if ($cekUsername == 'kosong') {
				if ($password != 'tidaksesuai') {
					$config['upload_path']          = './assets/img/asesor/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 1024;
					$config['max_width']            = 6000;
					$config['max_height']           = 6000;
					$config['overwrite'] = TRUE;
					$config['remove_spaces'] = TRUE;
					$config['encrypt_name'] = TRUE;
					$this->upload->initialize($config);
					if ($this->upload->do_upload('foto')) {
						$foto = $this->upload->data('file_name');
						if ($foto_lama != "noimage.png") {
							unlink('./assets/img/asesor/' . $foto_lama);
						}
					} else {
						$foto = $foto_lama;
					}
					if ($this->input->post('password', true) == "") {
						$data2 = array(
							'username' => $username,
							'nama' => $nama,
							'user_level' => '2'
						);
					} else {
						$data2 = array(
							'username' => $username,
							'nama' => $nama,
							'password' => $password,
							'user_level' => '2'
						);
					}
					$this->Masesor->edituser($data2, $id_user);
					$data = array(
						'no_met' => $no_met,
						'nama' => $nama,
						'foto' => $foto
					);
					$this->Masesor->editasesor($data, $id_asesor);
					$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Mengubah Data Asesor.
															</div>');
					redirect(base_url('asesor'));
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert">
		                                            		<strong>Gagal!</strong> Mohon periksa kembali Konfirmasi Kata Sandi.
		                                        		</div>');
					redirect(base_url('asesor/ubah/' . $id_asesor));
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
		                                            		<strong>Gagal!</strong> Nama Pengguna ' . $username . ' sudah ada, Coba lagi.
		                                        		</div>');
				redirect(base_url('asesor/ubah/' . $id_asesor));
			}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-warning left-icon-alert" role="alert">
			<strong>Gagal!</strong> Sudah Ada Asesor yang mempunyai No MET yang sama.
													</div>');
			redirect(base_url('asesor/ubah/' . $id_asesor));
		}
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
}
