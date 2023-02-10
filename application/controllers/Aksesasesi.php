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
		$this->load->model('Mapl01');
		$this->load->model('Mtahunaktif');
		$this->load->model('M_Akses');
		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$dataasesi = $this->Masesi->getasesidetail($data['idasesi']);
		$data['dataapl01'] = $this->Maksesasesi->getApl01Asesi($dataasesi['idas']);
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
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['dataasesi'] = $this->Masesi->getasesidetail($data['idasesi']);
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

	public function form_apl02($idunit)
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['dataasesi'] = $this->Masesi->getasesidetail($data['idasesi']);
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		$data['id_unit'] = $idunit;
		if (!$data['skema']) {
			echo '<script type="text/javascript">';
			echo 'alert("Anda belum memiliki Jadwal");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		}
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_apl02-form', $data);
		$this->load->view('template/footer');
	}

	public function apl02()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['dataasesi'] = $this->Masesi->getasesidetail($data['idasesi']);
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
		$this->load->view('v_akses-asesi/v_apl02', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Disimpan</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dipebaharui</div>');
			redirect(base_url('aksesasesi/apl01'));
		}
	}

	public function kom_process()
	{
		$add = 0;
		$update = 0;
		$gagal = 0;
		// $datajcek = "";
		// foreach ($_POST as $key => $value) {
		// 	echo $key . '=' . $value . '<br>';
		// }
		$id_asesi = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$id_unit = $this->input->post('id_unit', true);
		$padel = $this->db->query("SELECT * from tb_elemen where id_unit='$id_unit' order by urutan asc")->result_array();
		foreach ($padel as $hadel) {
			$id_elemen = $hadel['id'];
			$kom = $this->input->post('kom' . $id_elemen, true);
			$bukti = $this->input->post('bukti' . $id_elemen, true);
			$data = array(
				'id_elemen' => $id_elemen,
				'id_unit' => $id_unit,
				'id_asesi' => $id_asesi,
				'id_bukti' => $bukti,
				'kompetensi' => $kom
			);
			$jcek = $this->db->query("SELECT * from tb_apl_02 where id_elemen='$id_elemen' and id_asesi='$id_asesi'")->num_rows();
			if ($kom != "" and $bukti != "") {
				if ($jcek >= 1) {
					$this->db->where('id_asesi',  $id_asesi);
					$this->db->where('id_elemen',  $id_elemen);
					$this->db->update('tb_apl_02', $data);
					$update++;
				} else {
					$this->db->insert('tb_apl_02', $data);
					$add++;
				}
			} else {
				$gagal++;
			}
			// $datajcek = $datajcek . "-" . $jcek;
		}
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Status Data!</strong> Data Ditambahkan : ' . $add . ' data, Diubah : ' . $update . ' data, Gagal : ' . $gagal . ' data.</div>');
		redirect(base_url('aksesasesi/apl02'));
	}

	public function add_bukti()
	{
		$id_asesi = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$id_bukti = $this->input->post('id_bukti', true);
		$jenis_persyaratan = $this->Mapl01->getpersyaratanById($id_bukti);
		$dokumen = explode(',', $jenis_persyaratan);
		if (count($dokumen) == 1) {
			if ($dokumen[0] == "dokumen") {
				$allow_type = "pdf";
			} else {
				$allow_type = "jpg|jpeg|png";
			}
		} else {
			$allow_type = "pdf|jpg|jpeg|png";
		}
		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = $allow_type;
		$config['max_size']             = $jenis_persyaratan['max_size'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_bukti')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
			redirect(base_url('aksesasesi/apl01'));
		} else {
			$file_bukti = $this->upload->data('file_name');
		}
		$data = array(
			'id_asesi' => $id_asesi,
			'id_bukti' => $id_bukti,
			'file_bukti' => $file_bukti
		);
		$this->Maksesasesi->addbukti($data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">
																<strong>Sukses!</strong> Berhasil Menambahkan Data Persyaratan.
																</div>');
		redirect(base_url('aksesasesi/apl01'));
	}

	public function hapusbukti($id)
	{
		$idasesi = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$cekbukti = $this->Maksesasesi->getbuktiasesi($id, $idasesi)->num_rows();
		if ($cekbukti == 1) {
			$ambil_gambar = $this->Maksesasesi->getbuktiasesi($id, $idasesi)->row();
			$this->Maksesasesi->hapusbukti($id);
			unlink('./assets/bukti/' . $ambil_gambar->file_bukti);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dihapus</div>');
			redirect('aksesasesi/apl01');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Anda tidak berhak menghapus file ini</div>');
			redirect('aksesasesi/apl01');
		}
	}
}
