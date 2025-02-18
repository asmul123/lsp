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
		$this->load->model('Mujikom');
		$this->load->model('Mak01');
        $this->load->model('Maksesasesor');
		$this->load->model('M_Akses');
		$this->load->helper('tgl_indo');

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
		$pertanyaan = $this->input->post('pertanyaan', false);
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
		$pertanyaan = $this->input->post('pertanyaan', false);
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

	public function cetak($idskema, $idasesi = null)
	{

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datafria03'] = $this->Mfria03->getfria03($idskema);
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
		$this->load->view('v_fria03/v_fria03-cetak', $data);
		$this->load->view('template/footer_cetak');
	}

	public function repair_skema()
	{
		echo $this->Mfria03->repair_skema();
	}
}
