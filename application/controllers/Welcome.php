<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		cek_login_user();
	}

	public function index()
	{
		// var_dump($this->session);
		$thisM = date('m');
		$id = $this->session->userdata('tipeuser');
		$nominalKredit = 0;
		$nominalDebet = 0;
		$asesi = $this->db->get('tb_asesi')->num_rows();
		$asesor = $this->db->get('tb_asesor')->num_rows();
		$skema = $this->db->get('tb_skema')->num_rows();
		$pengguna = $this->db->get('tb_users')->num_rows();

		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['asesi'] = $asesi;
		$data['asesor'] = $asesor;
		$data['skema'] = $skema;
		$data['pengguna'] = $pengguna;
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/index', $data);
		$this->load->view('template/footer');
	}
}
