<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Ak04 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mak04');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataak04'] = $this->Mak04->getak04($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['idskema'] = $idskema;
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_ak04/v_ak04_form', $data);
		$this->load->view('template/footer');
	}

	public function ak04_process()
	{
		$idskema = $this->input->post('idskema', true);
		$jmlak01 = $this->Mak04->getcountak04($idskema);
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
			$this->Mak04->addak04($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Menambahkan Data AK 04.
					</div>');
			redirect(base_url('ak04/index/' . $idskema));
		} else {
			$data = array(
				'isi' => $input
			);
			$this->Mak01->editak01($data, $idskema);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Mengubah Data AK 04.
					</div>');
			redirect(base_url('ak04/index/' . $idskema));
		}
	}


	public function cetak($idskema)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		$this->load->view('v_ak04/v_ak04_cetak', $data);
		$this->load->view('template/footer_cetak');
	}
}
