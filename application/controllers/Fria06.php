<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Fria06 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mfria06');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafria06'] = $this->Mfria06->getfria06($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria06/v_fria06', $data);
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
		$this->load->view('v_fria06/v_fria06-add', $data);
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
		$data['datafr'] = $this->Mfria06->getdetailfria06($idfr);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['datafr']['id_skema']);
		$data['dataunit'] = $this->Mskema->getunit($data['datafr']['id_skema']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria06/v_fria06-edit', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id, $idskema)
	{

		$this->Mfria06->delia06($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Soal.
                                        		</div>');
		redirect(base_url('fria06/index/' . $idskema));
	}

	public function add_process()
	{
		$id_ia06 = $this->input->post('id_ia06', true);
		$id_skema = $this->input->post('id_skema', true);
		$id_unit = $this->input->post('id_unit', true);
		$pertanyaan = $this->input->post('pertanyaan', true);
		$jawaban = $this->input->post('jawaban', true);
		if ($id_ia06 == "") {
			$data = array(
				'id_skema' => $id_skema,
				'id_unit' => $id_unit,
				'pertanyaan' => $pertanyaan,
				'jawaban' => $jawaban
			);
			$this->Mfria06->addfria06($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Pertanyaan.
																</div>');
			redirect(base_url('fria06/index/' . $id_skema));
		} else {
			$data = array(
				'id_unit' => $id_unit,
				'pertanyaan' => $pertanyaan,
				'jawaban' => $jawaban
			);
			$this->Mfria06->editfria06($data, $id_ia06);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Pertanyaan.
																</div>');
			redirect(base_url('fria06/index/' . $id_skema));
		}
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
		$this->Mfria06->editfria06($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Pertanyaan.
																</div>');
		redirect(base_url('fria06/index/' . $id_skema));
	}
}
