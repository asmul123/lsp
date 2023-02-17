<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Ak01 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mak01');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataak01'] = $this->Mak01->getak01($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['idskema'] = $idskema;
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_ak01/v_ak01_form', $data);
		$this->load->view('template/footer');
	}

	public function ak01_process()
	{
		$idskema = $this->input->post('idskema', true);
		$jmlak01 = $this->Mak01->getcountak01($idskema);
		$input = "#";
		for ($i = 1; $i <= 5; $i++) {
			if ($this->input->post('tl' . $i) != "1") {
				$inputnya = 0;
			} else {
				$inputnya = 1;
			}
			$input = $input . $i . "-" . $inputnya . "#";
		}
		if ($jmlak01 == 0) {
			$data = array(
				'isi' => $input,
				'id_skema' => $idskema
			);
			$this->Mak01->addak01($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Menambahkan Data AK 01.
					</div>');
			redirect(base_url('ak01/index/' . $idskema));
		} else {
			$data = array(
				'isi' => $input
			);
			$this->Mak01->editak01($data, $idskema);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Mengubah Data AK 01.
					</div>');
			redirect(base_url('ak01/index/' . $idskema));
		}
	}

	public function cetak($idskema)
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		$file_pdf = 'FR.APL.02. ASESMEN MANDIRI';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "potrait";

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataak011'] = $this->Mak01->getak011($idskema);
		$data['dataak013'] = $this->Mak01->getak013($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		// $html = $this->load->view('v_ak01/v_ak01-cetak', $data, true);
		$this->load->view('v_ak01/v_ak01-cetak', $data);
		$this->load->view('template/footer_cetak');

		// $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
