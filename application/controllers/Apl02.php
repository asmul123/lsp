<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Apl02 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mskema');
		$this->load->model('Mapl02');
		$this->load->helper('tgl_indo');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function cetak($idskema, $idasesi = null)
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// filename dari pdf ketika didownload
		$file_pdf = 'FR.APL.02. ASESMEN MANDIRI';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "potrait";

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($data['dataskema']['id']);
		
		$data['idasesi'] = $idasesi;
		if ($idasesi != null) {
			$data['appapl02'] = $this->Mapl02->getapl02approve($idasesi);
			$dataURI    = $data['appapl02']->ttd_asesi;
			$dataPieces = explode(',', $dataURI);
			if ($dataPieces[0] == "data:image/png;base64") {
				$encodedImg = $dataPieces[1];
				$decodedImg = base64_decode($encodedImg);

				//  Check if image was properly decoded
				if ($decodedImg !== false) {
					$gbr = './assets/img/tmp/ttd_asesi.png';
					if (file_put_contents($gbr, $decodedImg) !== false) {
						if ($gbr) {
							$data['ttd_asesi'] = base_url().'assets/img/tmp/ttd_asesi.png';
						}
					}
				}
			}
			$dataURI2    = $data['appapl02']->ttd_asesor;
			$dataPieces2 = explode(',', $dataURI2);
			if ($dataPieces2[0] == "data:image/png;base64") {
				$encodedImg2 = $dataPieces2[1];
				$decodedImg2 = base64_decode($encodedImg2);

				//  Check if image was properly decoded
				if ($decodedImg2 !== false) {
					$gbr2 = './assets/img/tmp/ttd_asesor.png';
					if (file_put_contents($gbr2, $decodedImg2) !== false) {
						if ($gbr2) {
							$data['ttd_asesor'] = base_url().'assets/img/tmp/ttd_asesor.png';
						}
					}
				}
			}
		}
		// $this->load->view('template/header_cetak');
		$html = $this->load->view('v_apl02/v_apl02-cetak', $data, true);
		// $this->load->view('template/footer_cetak');

		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
