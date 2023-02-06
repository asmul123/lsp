<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Ujikom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        $this->load->model('Mskema');
        $this->load->model('Mtuk');
        $this->load->model('Mujikom');
        $this->load->model('Masesor');
        $this->load->model('Masesi');
        $this->load->model('M_Akses');
        cek_login_user();
    }

    public function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['ujikom'] = $this->Mujikom->getAll();
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Jadwal Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_ujikom/v_ujikom.php', $data);
        $this->load->view('template/footer');
    }

    public function asesorasesi($idpaket)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['datasertifikasi'] = $this->Mujikom->getsertifikasi($idpaket);
        $data['datapaket'] = $this->Mujikom->getDetail($idpaket);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Jadwal Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_ujikom/v_ujikom_partisipan.php', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Mujikom->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dihapus</div>');
        redirect('ujikom');
    }

    public function hapusrekam($id, $idpaket)
    {
        $this->Mujikom->hapusrekam($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dihapus</div>');
        redirect('ujikom/asesorasesi/' . $idpaket);
    }

    public function form($idjadwal = NULL)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['dataskema'] = $this->Mskema->getskema();
        $data['datatuk'] = $this->Mtuk->gettuk();
        $data['datajadwal'] = $this->Mujikom->getBYId($idjadwal);
        $data['idjadwal'] = $idjadwal;
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Jadwal Ujikom'])->row()->id_menus;
        $this->load->view('template/sidebar', $data);
        $this->load->view('v_ujikom/v_ujikom_form.php', $data);
        $this->load->view('template/footer');
    }

    public function rekam($idjadwal)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['dataskema'] = $this->Mskema->getskema();
        $data['datatuk'] = $this->Mtuk->gettuk();
        $data['datajadwal'] = $this->Mujikom->getDetail($idjadwal);
        $data['dataasesor'] = $this->Masesor->getasesor();
        $data['dataasesi'] = $this->Masesi->getasesi();
        $data['idjadwal'] = $idjadwal;
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Jadwal Ujikom'])->row()->id_menus;
        $this->load->view('template/sidebar', $data);
        $this->load->view('v_ujikom/v_ujikom_rekam.php', $data);
        $this->load->view('template/footer');
    }

    public function prosesdata()
    {

        $id = $this->input->post('id');
        $nama_paket = $this->input->post('nama_paket');
        $id_skema = $this->input->post('id_skema');
        $id_tuk = $this->input->post('id_tuk');
        $pembiayaan = $this->input->post('pembiayaan');
        $tgl_sertifikasi = $this->input->post('tgl_sertifikasi');
        $data = [
            'nama_paket' => $nama_paket,
            'id_skema' => $id_skema,
            'id_tuk' => $id_tuk,
            'tgl_sertifikasi' => $tgl_sertifikasi,
            'pembiayaan' => $pembiayaan
        ];
        if ($id == "") {
            $this->Mujikom->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Ditambahkan</div>');
            redirect('ujikom');
        } else {
            $this->Mujikom->ubah($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Diperbaharui</div>');
            redirect('ujikom');
        }
    }

    public function prosesrekam()
    {

        $id_paket = $this->input->post('id_paket');
        $id_asesor = $this->input->post('id_asesor');
        $id_asesi = $this->input->post('id_asesi');
        $count = count($id_asesi);
        $gagal = 0;
        $berhasil = 0;
        for ($i = 0; $i < $count; $i++) {
            $data_asesi = $id_asesi[$i];
            $cek = $this->Mujikom->cekrekam($data_asesi, $id_paket);
            if ($cek >= 1) {
                $gagal++;
            } else {
                $data = [
                    'id_asesor' => $id_asesor,
                    'id_asesi' => $data_asesi,
                    'id_paket' => $id_paket
                ];
                $this->Mujikom->rekam($data);
                $berhasil++;
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Mendambahkan : ' . $berhasil . ' data dan gagal Menambahkan : ' . $gagal . ' data</div>');
        redirect('ujikom/asesorasesi/' . $id_paket);
    }
}
