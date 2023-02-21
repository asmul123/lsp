<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Fria04 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mfria04');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafria04'] = $this->Mfria04->getfria04($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria04/v_fria04', $data);
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
		$this->load->view('v_fria04/v_fria04-add', $data);
		$this->load->view('template/footer');
	}

	public function ubah($idfr)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafr'] = $this->Mfria04->getdetailfria04($idfr);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['datafr']['id_skema']);
		$data['dataunit'] = $this->Mskema->getunit($data['datafr']['id_skema']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria04/v_fria04-edit', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id, $idskema)
	{

		$this->Mfria04->delia04($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Soal.
                                        		</div>');
		redirect(base_url('fria04/index/' . $idskema));
	}

	public function add_process()
	{
		$idskema = $this->input->post('idskema', true);
		$hasil = $this->input->post('hasil', false);
		$demonstrasi = $this->input->post('demonstrasi', false);
		$daftar_unit = $this->input->post('daftar_unit');
		$count = count($daftar_unit);
		$du = "";
		for ($i = 0; $i < $count; $i++) {
			$du = $du . "#" . $daftar_unit[$i];
		}
		$data = array(
			'id_skema' => $idskema,
			'hasil' => $hasil,
			'demonstrasi' => $demonstrasi,
			'daftar_unit' => $du
		);
		$this->Mfria04->addfria04($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Pekerjaan.
																</div>');
		redirect(base_url('fria04/index/' . $idskema));
	}

	public function edt_process()
	{
		$id = $this->input->post('id', true);
		$idskema = $this->input->post('idskema', true);
		$hasil = $this->input->post('hasil', false);
		$demonstrasi = $this->input->post('demonstrasi', false);
		$daftar_unit = $this->input->post('daftar_unit');
		$count = count($daftar_unit);
		$du = "";
		for ($i = 0; $i < $count; $i++) {
			$du = $du . "#" . $daftar_unit[$i];
		}
		$data = array(
			'hasil' => $hasil,
			'demonstrasi' => $demonstrasi,
			'daftar_unit' => $du
		);
		$this->Mfria04->editfria04($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Data Pekerjaan.
																</div>');
		redirect(base_url('fria04/index/' . $idskema));
	}

	public function cetak($idskema)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datafria04'] = $this->Mfria04->getfria04($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		$this->load->view('v_fria04/v_fria04-cetak', $data);
		$this->load->view('template/footer_cetak');
	}
}
