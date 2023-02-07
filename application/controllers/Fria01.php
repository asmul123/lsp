<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Fria01 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mfria01');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria01/v_fria01', $data);
		$this->load->view('template/footer');
	}

	public function list_sop($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataunit'] = $this->Mskema->getunitdetail($idunit);
		$data['dataskema'] = $this->Mskema->getskemadetail($data['dataunit']['id_skema']);
		$data['dataelemen'] = $this->Mskema->getelemen($idunit);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria01/v_list_sop', $data);
		$this->load->view('template/footer');
	}

	public function edit_sop($idelemen)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataelemen'] = $this->Mskema->getelemendetail($idelemen);
		$data['datakuk'] = $this->Mskema->getkuk($idelemen);
		$data['datafria01'] = $this->Mfria01->getfria01($idelemen);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_fria01/v_sop-edit', $data);
		$this->load->view('template/footer');
	}

	public function sop_process()
	{
		$idelemen = $this->input->post('idelemen', true);
		$de = $this->Mskema->getelemendetail($idelemen);
		$sop = $this->input->post('sop', true);
		$jmlfria01 = $this->Mfria01->getfria01($idelemen);
		if ($jmlfria01 == 0) {
			$data = array(
				'sop' => $sop,
				'id_elemen' => $idelemen
			);
			$this->Mfria01->addfria01($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Menambahkan Data SOP.
				</div>');
			redirect(base_url('fria01/list_sop/' . $de['id_unit']));
		} else {
			$data = array(
				'sop' => $sop
			);
			$this->Mfria01->editfria01($data, $idelemen);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Mengubah Data MPA.
				</div>');
			redirect(base_url('fria01/list_sop/' . $de['id_unit']));
		}
	}

	public function cetak($idskema)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datamapa02'] = $this->Mmapa02->getmapa02($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		$this->load->view('v_mapa02/v_mapa02-cetak', $data);
		$this->load->view('template/footer_cetak');
	}
}
