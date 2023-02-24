<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Asesiimport extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Masesi');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index()
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
				redirect(base_url('asesi/import'));
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
					for ($i = 2; $i < count($sheetData); $i++) {
						$cekNopes = $this->Masesi->cekNopes($sheetData[$i][0]);
						$cekUsername = $this->Masesi->cekUsername($sheetData[$i][2]);
						if ($cekNopes == 'kosong') {
							if ($cekUsername == 'kosong') {
								$data2 = array(
									'username' => $sheetData[$i][4],
									'nama' => $sheetData[$i][1],
									'password' => md5($sheetData[$i][5]),
									'user_level' => '3'
								);
								$this->Masesi->adduser($data2);
								$user = $this->Masesi->cekIdUser($sheetData[$i][4]);
								$data = array(
									'no_peserta' => $sheetData[$i][0],
									'nama' => $sheetData[$i][1],
									'kelas' => $sheetData[$i][2],
									'tahun_aktif' => $sheetData[$i][3],
									'foto' => 'noimage.png',
									'id_user' => $user->id
								);
								$this->Masesi->addasesi($data);
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
					redirect(base_url('asesi/import'));
				}
			} catch (Exception $e) {
				var_dump($e);
			}
			unlink($inputFileName);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
														<strong>Status Import!</strong> Berhasil : ' . $berhasil . ' data, Gagal : ' . $gagal . ' data
													</div>');
			redirect('asesi');
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert">
														<strong>Perhatian!</strong> Import Gagal.
													</div>');
			redirect('asesi/import');
		}
	}
}
