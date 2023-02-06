<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Mtuk');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['datatuk'] = $this->Mtuk->gettuk();
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data TUK'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_tuk/v_tuk', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data TUK'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_tuk/v_tuk-add', $data);
		$this->load->view('template/footer');
	}

	public function add_process()
	{
		$nama_tuk = $this->input->post('nama_tuk', true);
		$jenis_tuk = $this->input->post('jenis_tuk', true);
		$deskripsi = $this->input->post('deskripsi', true);
		$config['upload_path']          = './assets/img/tuk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1024;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
			$foto = "noimage.png";
		} else {
			$foto = $this->upload->data('file_name');
		}
		$data = array(
			'nama_tuk' => $nama_tuk,
			'jenis_tuk' => $jenis_tuk,
			'deskripsi' => $deskripsi,
			'foto' => $foto
		);
		$this->Mtuk->addtuk($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data TUK.
																</div>');
		redirect(base_url('tuk'));
	}

	public function hapus($id)
	{

		$this->Mtuk->hapusfoto($id);
		$this->Mtuk->deltuk($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data TUK.
                                        		</div>');
		redirect(base_url('tuk'));
	}

	public function ubah($idtuk)
	{
		$id = $this->session->userdata('tipeuser');
		$data['datatuk'] = $this->Mtuk->gettukdetail($idtuk);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data TUK'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_tuk/v_tuk-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_process()
	{
		$nama_tuk = $this->input->post('nama_tuk', true);
		$jenis_tuk = $this->input->post('jenis_tuk', true);
		$deskripsi = $this->input->post('deskripsi', true);
		$foto_lama = $this->input->post('foto_lama', true);
		$id_tuk = $this->input->post('id_tuk', true);
		$config['upload_path']          = './assets/img/tuk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1024;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('foto')) {
			$foto = $this->upload->data('file_name');
			if ($foto_lama != "noimage.png") {
				unlink('./assets/img/tuk/' . $foto_lama);
			}
		} else {
			$foto = $foto_lama;
		}
		$data = array(
			'nama_tuk' => $nama_tuk,
			'jenis_tuk' => $jenis_tuk,
			'deskripsi' => $deskripsi,
			'foto' => $foto
		);
		$this->Mtuk->edittuk($data, $id_tuk);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
					<strong>Sukses!</strong> Berhasil Mengubah Data TUK.
															</div>');
		redirect(base_url('tuk'));
	}
}
