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
		$this->load->model('Masesor');
		$this->load->model('Maksesasesi');
		$this->load->model('Mujikom');
		$this->load->model('Mapl01');
		$this->load->model('Mak01');
		$this->load->model('Mtuk');
		$this->load->model('Mtahunaktif');
		$this->load->model('M_Akses');
		$this->load->helper('tgl_indo');
		cek_login_user();
	}

	public function index()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$dataasesi = $this->Masesi->getasesidetail($data['idasesi']);
		$data['dataapl01'] = $this->Maksesasesi->getApl01Asesi($dataasesi['idas']);
		$data['dataapl02'] = $this->Maksesasesi->getApl02Asesi($dataasesi['idas']);
		$data['dataak01'] = $this->Maksesasesi->getAk01Asesi($dataasesi['idas']);
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

	public function ak01()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['dataasesi'] = $this->Masesi->getasesidetail($data['idasesi']);
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		$data['jadwal'] = $this->Maksesasesi->getjadwalasesi($data['idasesi']);
		$data['dataak01'] = $this->Mak01->getak01($data['skema']['id_skema']);
		if (!$data['skema']) {
			echo '<script type="text/javascript">';
			echo 'alert("Anda belum memiliki Jadwal");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		}
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_ak01', $data);
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

	public function ak04()
	{
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['dataasesi'] = $this->Masesi->getasesidetail($data['idasesi']);
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		$jak02 = $this->Maksesasesi->getcountak02($data['idasesi']);
		if (!$data['skema']) {
			echo '<script type="text/javascript">';
			echo 'alert("Anda belum memiliki Jadwal");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		} else if ($jak02 == 0) {
			echo '<script type="text/javascript">';
			echo 'alert("Formulir Banding dapat diisi apabila sudah ada putusan");';
			echo 'window.location.href = "' . base_url() . '";';
			echo '</script>';
		}
		$data['activeMenu'] = '';

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_ak04', $data);
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

	public function apl02_process()
	{

		$id_asesi = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$ttd = $this->input->post('ttd', false);
		$jmlapl02 = $this->Maksesasesi->getcountapl02($id_asesi);
		$data = array(
			'id_asesi' => $id_asesi,
			'id_asesor' => $this->Maksesasesi->getasesorasesi($id_asesi),
			'tgl_ajuan' => date('Y-m-d'),
			'ttd_asesi' => $ttd,
			'status_ajuan' => '1'
		);
		if ($jmlapl02 == 0) {
			$this->Maksesasesi->addapl02($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Disimpan</div>');
			redirect(base_url('aksesasesi/apl02'));
		} else {
			$this->Maksesasesi->editapl02($data, $id_asesi);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dipebaharui</div>');
			redirect(base_url('aksesasesi/apl02'));
		}
	}

	public function ak01_process()
	{

		$id_asesi = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$ttd = $this->input->post('ttd', false);
		$jmlak01 = $this->Maksesasesi->getcountak01($id_asesi);
		$data = array(
			'id_asesi' => $id_asesi,
			'id_asesor' => $this->Maksesasesi->getasesorasesi($id_asesi),
			'tgl_ttd_asesi' => date('Y-m-d'),
			'ttd_asesi' => $ttd
		);
		if ($jmlak01 == 0) {
			$this->Maksesasesi->addak01($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Disimpan</div>');
			redirect(base_url('aksesasesi/ak01'));
		} else {
			$this->Maksesasesi->editak01($data, $id_asesi);
			$this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dipebaharui</div>');
			redirect(base_url('aksesasesi/ak01'));
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

	public function daftar_test()
	{

		if ($this->session->userdata('id_test')) {
			redirect(base_url('aksesasesi/soal_test'));
		}
		$this->load->view('template/header');
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		$data['daftartest'] = $this->Maksesasesi->getTest($data['skema']['id_paket']);
		$data['ujikomdetail'] = $this->Mujikom->getDetail($data['skema']['id_paket']);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Daftar Test'])->row()->id_menus;

		$this->load->view('template/sidebar', $data);
		$this->load->view('v_akses-asesi/v_daftar_test', $data);
		$this->load->view('template/footer');
	}

	public function mulai_test($idtest)
	{

		if ($this->session->userdata('id_test')) {
			redirect(base_url('aksesasesi/soal_test'));
		}
		$this->load->view('template/header');
		$id = $this->session->userdata('tipeuser');
		$data['menu'] = $this->M_Setting->getmenu1($id);
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data['skema'] = $this->Maksesasesi->getskema($data['idasesi']);
		$data['data_test'] = $this->Maksesasesi->gettestdet($idtest)->row();
		$data['idtest'] = $idtest;
		$data['data_asesi'] = $this->Masesi->getasesidetail($data['idasesi']);
		$data['ujikomdetail'] = $this->Mujikom->getDetail($data['skema']['id_paket']);
		$data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Daftar Test'])->row()->id_menus;

		$this->load->view('v_akses-asesi/v_konfirmasi-test', $data);
		$this->load->view('template/footer');
	}

	public function soal_test($no = null)
	{
		$this->load->model('Mfria05');
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
		if ($no == null) {
			$no = $this->input->post('no', true);
		}
		$no_soal = $this->input->post('no_soal', true);
		$soal = $this->input->post('soal', true);
		$jawaban = $this->input->post('jawaban', true);
		if ($jawaban) {
			$rekaman_lama = $data_status_test->row()->rekaman;
			$rl = explode("#", $rekaman_lama);
			$new_ans = array(
				$no_soal => $soal . '-' . $jawaban
			);
			$update = array_replace($rl, $new_ans);
			$rek = "";
			for ($i = 1; $i < count($update); $i++) {
				$rek = $rek . "#" . $update[$i];
			}
			$data_ans = array(
				'rekaman' => $rek
			);
			$this->db->where('id_test', $this->session->userdata('id_test'));
			$this->db->where('id_asesi', $data['idasesi']);
			$this->db->update('tb_status_test', $data_ans);
		}
		if ($no == "akhir") {
			$betul = 0;
			$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
			$rekaman_test = $data_status_test->row()->rekaman;
			$rt = explode("#", $rekaman_test);
			$jml_soal = count($rt) - 1;
			for ($i = 1; $i < count($rt); $i++) {
				$hasil = explode("-", $rt[$i]);
				$cek_jawaban = $this->Maksesasesi->cekjawabanpg($hasil[0]);
				if ($cek_jawaban == $hasil[1]) {
					$kom = 'K';
					$betul++;
				} else {
					$kom = 'BK';
				}
				$cek_ia = $this->db->get_where('fr_ia_05', array('id_asesi' => $data['idasesi'], 'id_ia' => $hasil[0]))->num_rows();
				$id_unit = $this->db->get_where('tb_ia_05', array('id' => $hasil[0]))->row()->id_unit;
				$data_ia = array(
					'id_asesi' => $data['idasesi'],
					'id_unit' => $id_unit,
					'id_ia' => $hasil[0],
					'kompetensi' => $kom,
					'jawaban' => $hasil[1]
				);
				if ($cek_ia >= 1) {
					$id_fr = $this->db->get_where('fr_ia_05', array('id_asesi' => $data['idasesi'], 'id_ia' => $hasil[0]))->row()->id;
					$this->db->where('id', $id_fr);
					$this->db->update('fr_ia_05', $data_ia);
				} else {
					$this->db->insert('fr_ia_05', $data_ia);
				}
			}
			$nilai = $betul / $jml_soal * 100;
			$data_akhir = array(
				'nilai' => $nilai,
				'status_test' => '2'
			);
			$this->db->where('id_test', $this->session->userdata('id_test'));
			$this->db->where('id_asesi', $data['idasesi']);
			$this->db->update('tb_status_test', $data_akhir);
			$this->session->unset_userdata('id_test');
			redirect(base_url('aksesasesi/daftar_test'));
		}
		if ($this->session->userdata('id_test')) {
			$data_test = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			if ($data_status_test->num_rows() >= 1) {
				if ($data_status_test->row()->status_test == "2") {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Anda telah menyelesaikan test ini</div>');
					redirect(base_url('aksesasesi/daftar_test'));
				}
			} else {
				if ($data_test->id_jenis == 1) {
					$rekaman = $data_test->soal_observasi;
				} else if ($data_test->id_jenis == 2) {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					}
				} else {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					}
				}
				$data_awal = array(
					'id_asesi' => $data['idasesi'],
					'id_test' => $this->session->userdata('id_test'),
					'rekaman' => $rekaman,
					'start_at' => date('Y-m-d H:i:s'),
					'status_test' => '1'
				);
				$this->Maksesasesi->addasesitest($data_awal);
			}
			if ($no == null) {
				$no = 1;
			}
			$data['no'] = $no;
			$data['data_test'] = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			$durasi = $data['data_test']->durasi;
			$dr = explode(":", $durasi);
			$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
			$data['status_test'] = $data_status_test->row();
			$data['start_at'] = $data['status_test']->start_at;
			$finish_at = new DateTime($data['data_test']->finish_at);
			$datetime = new DateTime($data['start_at']);
			$datetime->add(new DateInterval('PT' . $dr[0] . 'H' . $dr[1] . 'M'));
			if ($finish_at < $datetime) {
				$data['finish_at'] = $finish_at;
			} else {
				$data['finish_at'] = $datetime;
			}
			$data['rekaman'] = $data['status_test']->rekaman;
			$this->load->view('template/header');
			$this->load->view('v_akses-asesi/v_test-page', $data);
			$this->load->view('template/footer');
		} else {
			$idtest = $this->input->post('idtest');
			$token = $this->input->post('token');
			if ($token) {
				$cektoken = $this->Maksesasesi->gettestdet($idtest)->row()->token;
				if ($cektoken == $token) {
					$session = array(
						'id_test' => $idtest
					);
					$this->session->set_userdata($session);
					redirect(base_url('aksesasesi/soal_test'));
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Token yang anda masukan salah</div>');
					redirect(base_url('aksesasesi/mulai_test/' . $idtest));
				}
			} else {
				redirect(base_url('aksesasesi/daftar_test'));
			}
		}
	}

	public function essay_test($no = null)
	{
		$this->load->model('Mfria06');
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
		if ($no == null) {
			$no = $this->input->post('no', true);
		}
		$soal = $this->input->post('soal', true);
		$unit = $this->input->post('unit', true);
		$jawaban = $this->input->post('jawaban', true);
		if ($jawaban) {
			$jawaban_lama = $this->db->get_where('fr_ia_06', array('id_asesi' => $data['idasesi'], 'id_ia' => $soal))->num_rows();
			$data_ans = array(
				'id_asesi' => $data['idasesi'],
				'id_unit' => $unit,
				'id_ia' => $soal,
				'jawaban' => $jawaban
			);
			if ($jawaban_lama >= 1) {
				$this->db->where('id_ia', $soal);
				$this->db->where('id_asesi', $data['idasesi']);
				$this->db->update('fr_ia_06', $data_ans);
			} else {
				$this->db->insert('fr_ia_06', $data_ans);
			}
		}
		if ($no == "akhir") {
			$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
			$data_akhir = array(
				'status_test' => '2'
			);
			$this->db->where('id_test', $this->session->userdata('id_test'));
			$this->db->where('id_asesi', $data['idasesi']);
			$this->db->update('tb_status_test', $data_akhir);
			$this->session->unset_userdata('id_test');
			redirect(base_url('aksesasesi/daftar_test'));
		}
		if ($this->session->userdata('id_test')) {
			$data_test = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			if ($data_status_test->num_rows() >= 1) {
				if ($data_status_test->row()->status_test == "2") {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Anda telah menyelesaikan test ini</div>');
					redirect(base_url('aksesasesi/daftar_test'));
				}
			} else {
				if ($data_test->id_jenis == 1) {
					$rekaman = $data_test->soal_observasi;
				} else if ($data_test->id_jenis == 2) {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					}
				} else {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					}
				}
				$data_awal = array(
					'id_asesi' => $data['idasesi'],
					'id_test' => $this->session->userdata('id_test'),
					'rekaman' => $rekaman,
					'start_at' => date('Y-m-d H:i:s'),
					'status_test' => '1'
				);
				$this->Maksesasesi->addasesitest($data_awal);
			}
			if ($no == null) {
				$no = 1;
			}
			$data['no'] = $no;
			$data['data_test'] = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			$durasi = $data['data_test']->durasi;
			$dr = explode(":", $durasi);
			$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
			$data['status_test'] = $data_status_test->row();
			$data['start_at'] = $data['status_test']->start_at;
			$datetime = new DateTime($data['start_at']);
			$datetime->add(new DateInterval('PT' . $dr[0] . 'H' . $dr[1] . 'M'));
			if ($data['data_test']->finish_at < $datetime) {
				$data['finish_at'] = $data['data_test']->finish_at;
			} else {
				$data['finish_at'] = $datetime;
			}
			$data['rekaman'] = $data['status_test']->rekaman;
			$this->load->view('template/header');
			$this->load->view('v_akses-asesi/v_essay-page', $data);
			$this->load->view('template/footer');
		} else {
			$idtest = $this->input->post('idtest');
			$token = $this->input->post('token');
			if ($token) {
				$cektoken = $this->Maksesasesi->gettestdet($idtest)->row()->token;
				if ($cektoken == $token) {
					$session = array(
						'id_test' => $idtest
					);
					$this->session->set_userdata($session);
					redirect(base_url('aksesasesi/essay_test'));
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Token yang anda masukan salah</div>');
					redirect(base_url('aksesasesi/mulai_test/' . $idtest));
				}
			} else {
				redirect(base_url('aksesasesi/daftar_test'));
			}
		}
	}

	public function hapus_target($id)
	{
		$this->db->select('*,tb_tugas_demonstrasi.id as idtugas');
		$this->db->from('tb_tugas_demonstrasi');
		$this->db->join('tb_status_test', 'tb_status_test.id=tb_tugas_demonstrasi.id_status_test');
		$this->db->where('tb_tugas_demonstrasi.id', $id);
		$query = $this->db->get()->row();
		$cekuser = $query->id_asesi;
		$jenis = $query->jenis;
		$target = $query->target;
		if ($cekuser == $this->Maksesasesi->getidasesi($this->session->userdata('id_user'))) {
			$this->db->delete('tb_tugas_demonstrasi', array('id' => $id));
			if ($jenis == 1) {
				unlink('./assets/assesment/demonstrasi/' . $target);
			}
		}
		redirect(base_url('aksesasesi/demonstrasi_test'));
	}

	public function demonstrasi_test($no = null)
	{
		$this->load->model('Mfria02');
		if ($tambah = $this->input->post('tambah')) {
			$id_status_test = $this->input->post('id_test');
			$id_ia = $this->input->post('id_ia');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			$data_tambah = array(
				'id_ia' => $id_ia,
				'id_status_test' => $id_status_test,
				'jenis' => '2',
				'judul' => $judul,
				'target' => $link
			);
			$this->db->insert('tb_tugas_demonstrasi', $data_tambah);
		} else if ($upload = $this->input->post('upload')) {
			$count = count($_FILES['file']['name']);
			$id_status_test = $this->input->post('id_test');
			$id_ia = $this->input->post('id_ia');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			for ($j = 0; $j < $count; $j++) {
				$_FILES['files']['name'] = $_FILES['file']['name'][$j];
				$_FILES['files']['type'] = $_FILES['file']['type'][$j];
				$_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'][$j];
				$_FILES['files']['error'] = $_FILES['file']['error'][$j];
				$_FILES['files']['size'] = $_FILES['file']['size'][$j];
				$config['upload_path'] = './assets/assesment/demonstrasi/';
				$config['allowed_types'] = '*';
				$config['max_size'] = $this->input->post('max_file');
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('files')) {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert">' . $this->upload->display_errors() . '</div>');
				} else {
					if ($count > 1) {
						$nofile = $j + 1;
						$judul_file = $judul . ' (' . $nofile . ')';
					} else {
						$judul_file = $judul;
					}
					$target = $this->upload->data('file_name');
					$data_upload = array(
						'id_ia' => $id_ia,
						'id_status_test' => $id_status_test,
						'jenis' => '1',
						'judul' => $judul_file,
						'target' => $target
					);
					$this->db->insert('tb_tugas_demonstrasi', $data_upload);
					$this->session->set_flashdata('alert', '<div class="alert alert-success left-icon-alert" role="alert">Upload berhasil</div>');
				}
			}
		}
		$data['idasesi'] = $this->Maksesasesi->getidasesi($this->session->userdata('id_user'));
		if ($no == 'akhir') {
			$data_akhir = array(
				'status_test' => '2'
			);
			$this->db->where('id_test', $this->session->userdata('id_test'));
			$this->db->where('id_asesi', $data['idasesi']);
			$this->db->update('tb_status_test', $data_akhir);
			$this->session->unset_userdata('id_test');
			redirect(base_url('aksesasesi/daftar_test'));
		}
		$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
		if ($this->session->userdata('id_test')) {
			$data_test = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			if ($data_status_test->num_rows() >= 1) {
				if ($data_status_test->row()->status_test == "2") {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Anda telah menyelesaikan test ini</div>');
					redirect(base_url('aksesasesi/daftar_test'));
				}
			} else {
				if ($data_test->id_jenis == 1) {
					$rekaman = $data_test->soal_observasi;
				} else if ($data_test->id_jenis == 2) {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalpg($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id . "-0";
						}
					}
				} else {
					if ($data_test->random_soal == 1) {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema'], 'Y');
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					} else {
						$skema = $this->Maksesasesi->getskema($data['idasesi']);
						$datasoal = $this->Maksesasesi->getsoalessay($skema['id_skema']);
						$rekaman = "";
						foreach ($datasoal as $ds) {
							$rekaman = $rekaman . "#" . $ds->id;
						}
					}
				}
				$data_awal = array(
					'id_asesi' => $data['idasesi'],
					'id_test' => $this->session->userdata('id_test'),
					'rekaman' => $rekaman,
					'start_at' => date('Y-m-d H:i:s'),
					'status_test' => '1'
				);
				$this->Maksesasesi->addasesitest($data_awal);
			}
			if ($no == null) {
				$no = 1;
			}
			$data['no'] = $no;
			$data['data_test'] = $this->Maksesasesi->gettestdet($this->session->userdata('id_test'))->row();
			$durasi = $data['data_test']->durasi;
			$dr = explode(":", $durasi);
			$data_status_test = $this->Maksesasesi->gettestasesi($data['idasesi'], $this->session->userdata('id_test'));
			$data['status_test'] = $data_status_test->row();
			$data['start_at'] = $data['status_test']->start_at;
			$datetime = new DateTime($data['start_at']);
			$datetime->add(new DateInterval('PT' . $dr[0] . 'H' . $dr[1] . 'M'));
			$data['finish_at'] = $datetime;
			$data['rekaman'] = $data['status_test']->rekaman;
			$this->load->view('template/header');
			$this->load->view('v_akses-asesi/v_demonstrasi-page', $data);
			$this->load->view('template/footer');
		} else {
			$idtest = $this->input->post('idtest');
			$token = $this->input->post('token');
			if ($token) {
				$cektoken = $this->Maksesasesi->gettestdet($idtest)->row()->token;
				if ($cektoken == $token) {
					$session = array(
						'id_test' => $idtest
					);
					$this->session->set_userdata($session);
					redirect(base_url('aksesasesi/demonstrasi_test'));
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-alert" role="alert"> <strong>Gagal!</strong> Token yang anda masukan salah</div>');
					redirect(base_url('aksesasesi/mulai_test/' . $idtest));
				}
			} else {
				redirect(base_url('aksesasesi/daftar_test'));
			}
		}
	}
}
