<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Aksesasesi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Masesi');
		$this->load->model('Mskema');
		$this->load->model('Maksesasesi');
		$this->load->model('Mtahunaktif');
		$this->load->model('M_Akses');
		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataasesi'] = $this->Masesi->getasesi();
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_beranda', $data);
		$this->load->view('template/footer');
	}

	public function apl01()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataasesi'] = $this->Masesi->getasesidetail($this->session->userdata('id_user'));
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		if (!$data['skema']) {
			echo '<script type="text/javascript">';
			echo 'alert("Anda belum memiliki Jadwal");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		}
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_apl01', $data);
		$this->load->view('template/footer');
	}

	public function apl01_process()
	{
		$id_asesi = $this->input->post('id_asesi', true);
		$nama_lengkap = $this->input->post('nama_lengkap', true);
		$nik = $this->input->post('nik', true);
		$tempat_lahir = $this->input->post('tempat_lahir', true);
		$tgl_lahir = $this->input->post('tgl_lahir', true);
		$jk = $this->input->post('jk', true);
		$kebangsaan = $this->input->post('kebangsaan', true);
		$alamat_rumah = $this->input->post('alamat_rumah', true);
		$kode_pos = $this->input->post('kode_pos', true);
		$telp = $this->input->post('telp', true);
		$mail = $this->input->post('mail', true);
		$ttd = $this->input->post('ttd', false);
		$jmlapl01 = $this->Maksesasesi->getcountapl01($id_asesi);
		if ($jmlapl01 == 0) {
			$data = array(
				'id_asesi' => $id_asesi,
				'nama_lengkap' => $nama_lengkap,
				'nik' => $nik,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'jenis_kelamin' => $jk,
				'kebangsaan' => $kebangsaan,
				'alamat_rumah' => $alamat_rumah,
				'kode_pos' => $kode_pos,
				'telp' => $telp,
				'email' => $mail,
				'ttd' => $ttd,
				'status' => '1',
				'tgl_apl' => date('Y-m-d')
			);
			$this->Maksesasesi->addapl01($data);
			$dataasesi = array(
				'id_asesi' => $id_asesi
			);
			$this->Maksesasesi->addappapl01($dataasesi);
			redirect(base_url('aksesasesi/apl01'));
		} else {
			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'nik' => $nik,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'jenis_kelamin' => $jk,
				'kebangsaan' => $kebangsaan,
				'alamat_rumah' => $alamat_rumah,
				'kode_pos' => $kode_pos,
				'telp' => $telp,
				'email' => $mail,
				'ttd' => $ttd,
				'status' => '1',
				'tgl_apl' => date('Y-m-d')
			);
			$this->Maksesasesi->editapl01($data, $id_asesi);
			redirect(base_url('aksesasesi/apl01'));
		}
	}
}
