<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Apl01 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function cetak($idskema)
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// filename dari pdf ketika didownload
		$file_pdf = '01. FR.APL-01 Permohonan Sertifikasi Kompetensi';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "potrait";

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($data['dataskema']['id']);
		// $this->load->view('template/header_cetak');
		$html = $this->load->view('v_apl01/v_apl01-cetak', $data, true);
		// $this->load->view('template/footer_cetak');

		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
