<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Askem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        $this->load->model('Mskema');
        $this->load->model('Masesor');
        $this->load->model('Maskem');
        $this->load->model('M_Akses');
        cek_login_user();
    }

    public function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['askem'] = $this->Maskem->getAll();
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Asesor Skema'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_askem/v_askem.php', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Maskem->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Dihapus</div>');
        redirect('askem');
    }

    public function form($idaskem = NULL)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['dataskema'] = $this->Mskema->getskema();
        $data['dataasesor'] = $this->Masesor->getasesor();
        $data['idaskem'] = $idaskem;
        $data['dataaskem'] = $this->Maskem->getDetail($idaskem);
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Asesor Skema'])->row()->id_menus;
        $this->load->view('template/sidebar', $data);
        $this->load->view('v_askem/v_askem_form.php', $data);
        $this->load->view('template/footer');
    }

    public function prosesdata()
    {

        $id = $this->input->post('id');
        $id_asesor = $this->input->post('id_asesor');
        $id_skema = $this->input->post('id_skema');
        $cek = $this->Maskem->cekaskem($id_skema, $id_asesor);
        if ($cek >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert"> <strong>Gagal!</strong> Data Sudah ada</div>');
            redirect('askem');
        } else {
            $data = [
                'id_asesor' => $id_asesor,
                'id_skema' => $id_skema
            ];
            if ($id == "") {
                $this->Maskem->tambah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Ditambahkan</div>');
                redirect('askem');
            } else {
                $this->Maskem->ubah($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert"> <strong>Sukses!</strong> Data Berhasil Diperbaharui</div>');
                redirect('askem');
            }
        }
    }
}
