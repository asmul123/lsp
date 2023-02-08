<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Fria03 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mfria03');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafria03'] = $this->Mfria03->getfria03($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria03/v_fria03', $data);
		$this->load->view('template/footer');
	}

	public function tambah($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria03/v_fria03-add', $data);
		$this->load->view('template/footer');
	}

	public function detail($idfr)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafr'] = $this->Mfria02->getdetailfria02($idfr);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['datafr']['id_skema']);
		$data['dataunit'] = $this->Mskema->getunit($data['datafr']['id_skema']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria02/v_fria02-detail', $data);
		$this->load->view('template/footer');
	}

	public function ubah($idfr)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafr'] = $this->Mfria03->getdetailfria03($idfr);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['datafr']['id_skema']);
		$data['dataunit'] = $this->Mskema->getunit($data['datafr']['id_skema']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria03/v_fria03-edit', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id, $idskema)
	{

		$this->Mfria03->delia03($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Soal.
                                        		</div>');
		redirect(base_url('fria03/index/' . $idskema));
	}

	public function add_process()
	{
		$id_skema = $this->input->post('id_skema', true);
		$id_unit = $this->input->post('id_unit', true);
		$pertanyaan = $this->input->post('pertanyaan', true);
		$data = array(
			'id_skema' => $id_skema,
			'id_unit' => $id_unit,
			'pertanyaan' => $pertanyaan
		);
		$this->Mfria03->addfria03($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Pertanyaan.
																</div>');
		redirect(base_url('fria03/index/' . $id_skema));
	}

	public function edt_process()
	{
		$id = $this->input->post('id', true);
		$id_skema = $this->input->post('id_skema', true);
		$id_unit = $this->input->post('id_unit', true);
		$pertanyaan = $this->input->post('pertanyaan', true);
		$data = array(
			'id_unit' => $id_unit,
			'pertanyaan' => $pertanyaan
		);
		$this->Mfria03->editfria03($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Pertanyaan.
																</div>');
		redirect(base_url('fria03/index/' . $id_skema));
	}

	public function cetak($idskema)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datafria03'] = $this->Mfria03->getfria03($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		$this->load->view('v_fria03/v_fria03-cetak', $data);
		$this->load->view('template/footer_cetak');
	}

	public function repair_skema()
	{
		echo $this->Mfria03->repair_skema();
	}
}
