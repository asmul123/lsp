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
		$jumlah_jadwal = $this->Maksesasesi->getjadwal($data['idasesi']);
		if (!$data['skema']) {
			echo '<script type="text/javascript">';
			echo 'alert("Anda belum memiliki Jadwal ' . $jumlah_jadwal . '");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		}
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_apl01', $data);
		$this->load->view('template/footer');
	}
}
