<?php

date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('M_Setting');
		$this->load->model('Manggota');
		$this->load->model('M_Akses');

		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['dataanggota'] = $this->Manggota->getstruktur();
		$data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Anggota'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_anggota/v_anggota', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Anggota'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_anggota/v_anggota-add', $data);
		$this->load->view('template/footer');
	}

	public function add_process()
	{
		$urutan = $this->input->post('urutan', true);
		$nama = $this->input->post('nama', true);
		$jabatan = $this->input->post('jabatan', true);
		$foto = $this->input->post('foto', true);
		$config['upload_path']          = './assets/img/anggota/';
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
			'nama' => $nama,
			'jabatan' => $jabatan,
			'urutan' => $urutan,
			'foto' => $foto
		);
		$this->Manggota->addanggota($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Anggota.
																</div>');
		redirect(base_url('anggota'));
	}

	public function hapus($id)
	{

		$this->Manggota->hapusfoto($id);
		$this->Manggota->delanggota($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
		<strong>Sukses!</strong> Berhasil Menghapus Data Anggota.
                                        		</div>');
		redirect(base_url('anggota'));
	}

	public function ubah($iduser)
	{
		$id = $this->session->userdata('tipeuser');
		$data['dataanggota'] = $this->Manggota->getstrukturdetail($iduser);
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Data Pengguna'])->row()->id_menus;

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_anggota/v_anggota-edit', $data);
		$this->load->view('template/footer');
	}

	public function edt_process()
	{
		$id = $this->input->post('id', true);
		$urutan = $this->input->post('urutan', true);
		$nama = $this->input->post('nama', true);
		$jabatan = $this->input->post('jabatan', true);
		$foto_lama = $this->input->post('foto_lama', true);
		$foto = $this->input->post('foto', true);
		$config['upload_path']          = './assets/img/anggota/';
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
			$foto = $foto_lama;
		} else {
			$foto = $this->upload->data('file_name');
			if ($foto_lama != "noimage.png") {
				unlink('./assets/img/anggota/' . $foto_lama);
			}
		}
		$data = array(
			'nama' => $nama,
			'jabatan' => $jabatan,
			'urutan' => $urutan,
			'foto' => $foto
		);
		$this->Manggota->editanggota($data, $id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Mengubah Data Anggota.
																</div>');
		redirect(base_url('anggota'));
	}
}
