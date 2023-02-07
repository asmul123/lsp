<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Mapa01 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mmapa01');
		$this->load->model('Mskema');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['jmlmapa011'] = $this->Mmapa01->getcoutmapa011($idskema);
		$data['jmlmapa013'] = $this->Mmapa01->getcoutmapa013($idskema);
		$data['jmlkuk'] = $this->Mmapa01->getcoutkuk($idskema);
		$data['jmlbukti'] = $this->Mmapa01->getcoutbukti($idskema);
		// $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_mapa01/v_mapa01', $data);
		$this->load->view('template/footer');
	}

	public function edit_mpa($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datamapa011'] = $this->Mmapa01->getmapa011($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$jmlmapa011 = $this->Mmapa01->getcoutmapa011($idskema);
		$data['idskema'] = $idskema;
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		if ($jmlmapa011 == 0) {
			$this->load->view('v_mapa01/v_mpa_kosong', $data);
		} else {
			$this->load->view('v_mapa01/v_mpa', $data);
		}
		$this->load->view('template/footer');
	}

	public function mpa_process()
	{
		$idskema = $this->input->post('idskema', true);
		$jmlmapa011 = $this->Mmapa01->getcoutmapa011($idskema);
		$isi = "#";
		for ($i = 1; $i <= 27; $i++) {
			if ($this->input->post('checkbox' . $i, true) != "1") {
				$isinya = 0;
			} else {
				$isinya = 1;
			}
			$isi = $isi . $i . "-" . $isinya . "#";
		}
		$text = "#";
		for ($i = 1; $i <= 6; $i++) {
			$text = $text . $i . "_" . $this->input->post('textfield' . $i, true) . "#";
		}
		$radio = "#";
		for ($i = 1; $i <= 3; $i++) {
			$radio = $radio . $i . "-" . $this->input->post('radio' . $i, true) . "#";
		}
		if ($jmlmapa011 == 0) {
			$data = array(
				'isi' => $isi,
				'text' => $text,
				'radio' => $radio,
				'id_skema' => $idskema
			);
			$this->Mmapa01->addmapa011($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Menambahkan Data MPA.
				</div>');
			redirect(base_url('mapa01/index/' . $idskema));
		} else {
			$data = array(
				'isi' => $isi,
				'text' => $text,
				'radio' => $radio
			);
			$this->Mmapa01->editmapa011($data, $idskema);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Mengubah Data MPA.
				</div>');
			redirect(base_url('mapa01/index/' . $idskema));
		}
	}

	public function add_mra_process()
	{
		$id_bukti = $this->input->post('id_bukti', true);
		$id_kuk = $this->input->post('id_kuk', true);
		$id_unit = $this->input->post('id_unit', true);
		$bukti = $this->input->post('bukti', true);
		$jenis_bukti = $this->input->post('jenis_bukti', true);
		$metode_lama = $this->input->post('metode_lama', true);
		$metode = $this->input->post('metode', true);
		$perangkat_asesmen = $this->input->post('perangkat_asesmen', true);
		if ($id_bukti == "") {
			$data = array(
				'bukti' => $bukti,
				'jenis_bukti' => $jenis_bukti,
				$metode => $perangkat_asesmen,
				'id_kuk' => $id_kuk
			);
			$this->Mmapa01->addmapa012($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Menambahkan Data Bukti.
				</div>');
			redirect(base_url('mapa01/list_mra/' . $id_unit));
		} else {
			if ($metode != $metode_lama) {
				$data = array(
					'bukti' => $bukti,
					'jenis_bukti' => $jenis_bukti,
					$metode_lama => '',
					$metode => $perangkat_asesmen
				);
			} else {
				$data = array(
					'bukti' => $bukti,
					'jenis_bukti' => $jenis_bukti,
					$metode => $perangkat_asesmen
				);
			}
			$this->Mmapa01->editmapa012($data, $id_bukti);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
				<strong>Sukses!</strong> Berhasil Mengubah Data Bukti.
				</div>');
			redirect(base_url('mapa01/list_mra/' . $id_unit));
		}
	}

	public function edit_mra($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_mapa01/v_mra', $data);
		$this->load->view('template/footer');
	}

	public function list_mra($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataunit'] = $this->Mskema->getunitdetail($idunit);
		$data['dataelemen'] = $this->Mskema->getelemen($idunit);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_mapa01/v_mra-list', $data);
		$this->load->view('template/footer');
	}

	public function tambah_bukti_mra($idkuk)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datakuk'] = $this->Mskema->getkukdetail($idkuk);
		$data['dataelemen'] = $this->Mskema->getelemendetail($data['datakuk']['id_elemen']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_mapa01/v_mra_bukti-add', $data);
		$this->load->view('template/footer');
	}

	public function edit_bukti_mra($idbukti)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datamapa012'] = $this->Mmapa01->getdetailmapa012($idbukti);
		$data['datakuk'] = $this->Mskema->getkukdetail($data['datamapa012']['id_kuk']);
		$data['dataelemen'] = $this->Mskema->getelemendetail($data['datakuk']['id_elemen']);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_mapa01/v_mra_bukti-edit', $data);
		$this->load->view('template/footer');
	}

	public function hapus_bukti_mra($id, $idunit)
	{

		$this->Mmapa01->delbukti($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Bukti.
                                        		</div>');
		redirect(base_url('mapa01/list_mra/' . $idunit));
	}

	public function edit_mpmk($idskema)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datamapa013'] = $this->Mmapa01->getmapa013($idskema);
		$jmlmapa013 = $this->Mmapa01->getcoutmapa013($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['idskema'] = $idskema;
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Skema'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		if ($jmlmapa013 == 0) {
			$this->load->view('v_mapa01/v_mpmk_kosong', $data);
		} else {
			$this->load->view('v_mapa01/v_mpmk', $data);
		}
		$this->load->view('template/footer');
	}

	public function mpmk_process()
	{
		$idskema = $this->input->post('idskema', true);
		$jmlmapa013 = $this->Mmapa01->getcoutmapa013($idskema);
		$input = "#";
		for ($i = 1; $i <= 5; $i++) {
			if ($this->input->post('input' . $i) != "1") {
				$inputnya = 0;
			} else {
				$inputnya = 1;
			}
			$input = $input . $i . "-" . $inputnya . "#";
		}
		$text = "#";
		for ($i = 1; $i <= 6; $i++) {
			$text = $text . $i . "_" . $this->input->post('textfield' . $i, true) . "#";
		}
		$list = "#";
		for ($i = 1; $i <= 5; $i++) {
			$list = $list . $i . "-" . $this->input->post('select' . $i, true) . "#";
		}
		if ($jmlmapa013 == 0) {
			$data = array(
				'list' => $list,
				'text' => $text,
				'cek' => $input,
				'id_skema' => $idskema
			);
			$this->Mmapa01->addmapa013($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Menambahkan Data MPMK.
					</div>');
			redirect(base_url('mapa01/index/' . $idskema));
		} else {
			$data = array(
				'list' => $list,
				'text' => $text,
				'cek' => $input
			);
			$this->Mmapa01->editmapa013($data, $idskema);
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Mengubah Data MPMK.
					</div>');
			redirect(base_url('mapa01/index/' . $idskema));
		}
	}

	public function cetak($idskema)
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		$file_pdf = 'FR.APL.02. ASESMEN MANDIRI';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "potrait";

		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['datamapa011'] = $this->Mmapa01->getmapa011($idskema);
		$data['datamapa013'] = $this->Mmapa01->getmapa013($idskema);
		$data['dataskema'] = $this->Mskema->getskemadetail($idskema);
		$data['dataunit'] = $this->Mskema->getunit($idskema);
		$data['idskema'] = $idskema;
		$this->load->view('template/header_cetak');
		// $html = $this->load->view('v_mapa01/v_mapa01-cetak', $data, true);
		$this->load->view('v_mapa01/v_mapa01-cetak', $data);
		$this->load->view('template/footer_cetak');

		// $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
