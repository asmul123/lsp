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
		$this->load->model('Mujikom');
		$this->load->model('Mak01');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');
		$this->load->helper('tgl_indo');

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

	public function cetak($idskema, $idasesi = null)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$data['idasesi'] = $idasesi;
		if ($idasesi != null) {
			$idser = $this->Mujikom->getserasesi($idasesi);
			$data['datathisser'] = $this->Mujikom->getthisser($idser);
			$data['ak01asesi'] = $this->Mak01->getak01asesi($idasesi);
			$dataURI    = $data['ak01asesi']->ttd_asesi;
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
			$dataURI2    = $data['ak01asesi']->ttd_asesor;
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
		$this->load->view('template/header_cetak');
		$this->load->view('v_fria01/v_fria01-cetak', $data);
		$this->load->view('template/footer_cetak');
	}
}
