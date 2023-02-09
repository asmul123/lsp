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
		$this->load->model('Mapl01');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datapersyaratan'] = $this->Mapl01->getpersyaratan($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_apl01/v_apl01', $data);
		$this->load->view('template/footer');
	}

	public function form($idskema, $idbukti = NULL)
	{
		$id = $this->session->userdata('tipeuser');
		$data['idbukti'] = $idbukti;
		$data['databukti'] = $this->Mapl01->getpersyaratanById($idbukti);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Asesor Skema'])->row()->id_menus;
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_apl01/v_apl01_form.php', $data);
		$this->load->view('template/footer');
	}

	public function prosesdata()
	{

		$id = $this->input->post('id');
		$idskema = $this->input->post('idskema');
		$bukti = $this->input->post('bukti');
		$max_size = $this->input->post('max_size');
		$filetype = $this->input->post('file_type');
		if (count($filetype) == 1) {
			$file_type = $filetype[0];
		} else {
			$file_type =  $filetype[0] . ',' . $filetype[1];
		}
		$data = [
			'id_skema' => $idskema,
			'bukti' => $bukti,
			'max_size' => $max_size,
			'file_type' => $file_type
		];
		if ($id == "") {
			$this->Mapl01->addpersyaratan($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Ditambahkan</div>');
			redirect('apl01/index/' . $idskema);
		} else {
			$this->Mapl01->editpersyaratan($data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Diperbaharui</div>');
			redirect('apl01/index/' . $idskema);
		}
	}

	public function hapus($id, $idskema)
	{
		$this->Mapl01->hapus($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dihapus</div>');
		redirect('apl01/index/' . $idskema);
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
