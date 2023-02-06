<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Mapa02 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mmapa02');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datamapa02'] = $this->Mmapa02->getmapa02($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$jmlmapa02 = $this->Mmapa02->getcoutmapa02($idskema);
		$data['idskema'] = $idskema;
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		if ($jmlmapa02 == 0) {
			$this->load->view('v_mapa02/v_mapa_kosong', $data);
		} else {
			$this->load->view('v_mapa02/v_mapa', $data);
		}
		$this->load->view('template/footer');
	}

	public function mapa_process()
	{
		$idskema = $this->input->post('idskema', true);
		$jmlmapa02 = $this->Mmapa02->getcoutmapa02($idskema);
		$isi = "#";
		for ($i = 1; $i <= 11; $i++) {
			if ($this->input->post('radio' . $i, true) == 0) {
				$isinya = "";
			} else {
				$isinya = $this->input->post('radio' . $i, true);
			}
			$isi = $isi . $i . "-" . $isinya . "#";
		}
		if ($jmlmapa02 == 0) {
			$data = array(
				'isi' => $isi,
				'id_skema' => $idskema
			);
			$this->Mmapa02->addmapa02($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Menambahkan Data MAPA 02.
				</div>');
			redirect(base_url('mapa02/index/' . $idskema));
		} else {
			$data = array(
				'isi' => $isi
			);
			$this->Mmapa02->editmapa02($data, $idskema);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Mengubah Data MAPA 02.
				</div>');
			redirect(base_url('mapa02/index/' . $idskema));
		}
	}
}
