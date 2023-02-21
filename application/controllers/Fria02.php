<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Fria02 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mfria02');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datafria02'] = $this->Mfria02->getfria02($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria02/v_fria02', $data);
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
		$this->load->view('v_fria02/v_fria02-add', $data);
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
		$data['datafr'] = $this->Mfria02->getdetailfria02($idfr);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['datafr']['id_skema']);
		$data['dataunit'] = $this->Mskema->getunit($data['datafr']['id_skema']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria02/v_fria02-edit', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id, $idskema)
	{

		$this->Mfria02->delia02($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Soal.
                                        		</div>');
		redirect(base_url('fria02/index/' . $idskema));
	}

	public function add_process()
	{
		$idskema = $this->input->post('idskema', true);
		$judul_tugas = $this->input->post('judul_tugas', true);
		$alokasi_waktu = $this->input->post('alokasi_waktu', true);
		$daftar_unit = $this->input->post('daftar_unit');
		$count = count($daftar_unit);
		$du = "";
		for ($i = 0; $i < $count; $i++) {
			$du = $du . "#" . $daftar_unit[$i];
		}
		$petunjuk = $this->input->post('petunjuk', false);
		$sekenario = $this->input->post('sekenario', false);
		$langkah_kerja = $this->input->post('langkah_kerja', false);

		$data = array(
			'id_skema' => $idskema,
			'judul_tugas' => $judul_tugas,
			'alokasi_waktu' => $alokasi_waktu,
			'daftar_unit' => $du,
			'petunjuk' => $petunjuk,
			'sekenario' => $sekenario,
			'langkah_kerja' => $langkah_kerja
		);
		$this->Mfria02->addfria02($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Tugas.
																</div>');
		redirect(base_url('fria02/index/' . $idskema));
	}

	public function edt_process()
	{
		$id = $this->input->post('idfr', true);
		$id_skema = $this->input->post('idskema', true);
		$judul_tugas = $this->input->post('judul_tugas', true);
		$alokasi_waktu = $this->input->post('alokasi_waktu', true);
		$daftar_unit = $this->input->post('daftar_unit');
		$count = count($daftar_unit);
		$du = "";
		for ($i = 0; $i < $count; $i++) {
			$du = $du . "#" . $daftar_unit[$i];
		}
		$petunjuk = $this->input->post('petunjuk', false);
		$sekenario = $this->input->post('sekenario', false);
		$langkah_kerja = $this->input->post('langkah_kerja', false);

		$data = array(
			'judul_tugas' => $judul_tugas,
			'alokasi_waktu' => $alokasi_waktu,
			'daftar_unit' => $du,
			'petunjuk' => $petunjuk,
			'sekenario' => $sekenario,
			'langkah_kerja' => $langkah_kerja
		);
		$this->Mfria02->editfria02($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Data Tugas.
																</div>');
		redirect(base_url('fria02/index/' . $id_skema));
	}

	public function cetak($idskema)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datafria02'] = $this->Mfria02->getfria02($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		$this->load->view('v_fria02/v_fria02-cetak', $data);
		$this->load->view('template/footer_cetak');
	}

	public function repair_skema()
	{
		echo $this->Mfria02->repair_skema();
	}
}
