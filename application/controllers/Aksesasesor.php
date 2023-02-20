<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Aksesasesor extends CI_Controller
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
        $this->load->model('Maksesasesor');
        $this->load->model('Maksesasesi');
        $this->load->model('Mmapa01');
        $this->load->model('Mfria03');
        $this->load->model('Mfria05');
        $this->load->model('Mfria06');
        $this->load->model('Mfria07');
        $this->load->model('M_Akses');
        $this->load->helper('tgl_indo');
        cek_login_user();
    }

    public function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['ujikom'] = $this->Maksesasesor->getJadwal($idasesor);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_aksesasesor.php', $data);
        $this->load->view('template/footer');
    }

    public function proses($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataak02'] = $this->Maksesasesor->getAk02($idasesi);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_putusan.php', $data);
        $this->load->view('template/footer');
    }

    public function daftar_asesi($idpaket)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($idpaket);
        $data['daftarasesi'] = $this->Maksesasesor->getAsesi($idpaket, $idasesor);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_daftar_asesi.php', $data);
        $this->load->view('template/footer');
    }

    public function fria01($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunit($data['ujikomdetail']['id_skema']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria01.php', $data);
        $this->load->view('template/footer');
    }

    public function fria03($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunit($data['ujikomdetail']['id_skema']);
        $data['datafria03'] = $this->Mfria03->getfria03($data['ujikomdetail']['id_skema']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria03.php', $data);
        $this->load->view('template/footer');
    }

    public function fria06($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunit($data['ujikomdetail']['id_skema']);
        $data['datafria06'] = $this->Mfria06->getfria06($data['ujikomdetail']['id_skema']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria06.php', $data);
        $this->load->view('template/footer');
    }

    public function fria07($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunit($data['ujikomdetail']['id_skema']);
        $data['datafria07'] = $this->Mfria07->getfria07($data['ujikomdetail']['id_skema']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria07.php', $data);
        $this->load->view('template/footer');
    }

    public function fria05($idasesi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunit($data['ujikomdetail']['id_skema']);
        $data['datafria05'] = $this->Mfria05->getfria05($data['ujikomdetail']['id_skema']);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria05.php', $data);
        $this->load->view('template/footer');
    }

    public function ia01proses($idasesi, $idunit)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $idasesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $dataserti = $this->Maksesasesi->getpaket($idasesi);
        $data['ujikomdetail'] = $this->Mujikom->getDetail($dataserti['id_paket']);
        $data['dataasesor'] = $this->Masesor->getasesordetail($idasesor);
        $data['dataasesi'] = $this->Masesi->getasesidetail($idasesi);
        $data['dataunit'] = $this->Mskema->getunitdetail($idunit);
        $data['akses'] = $this->M_Akses->getByLinkSubMenu(urlPath(), $id);
        $data['activeMenu'] = $this->db->get_where('tb_submenu', ['submenu' => 'Pelaksanaan Ujikom'])->row()->id_menus;

        $this->load->view('template/sidebar', $data);
        $this->load->view('v_aksesasesor/v_fria01-form.php', $data);
        $this->load->view('template/footer');
    }

    public function ia01save()
    {
        $add = 0;
        $update = 0;
        $id_unit = $this->input->post('id_unit', true);
        $id_asesi = $this->input->post('id_asesi', true);
        $pcdunit = $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_kuk left join tb_elemen on (tb_kuk.id_elemen=tb_elemen.id) where id_unit='" . $id_unit . "'")->result_array();
        foreach ($pcdunit as $icdunit) {
            $pcdia = $this->db->query("SELECT * FROM fr_ia_01 where id_asesi='" . $id_asesi . "' and id_kuk='" . $icdunit['id_kuk'] . "'");
            $jcdia = $pcdia->num_rows();
            $kom = $this->input->post('kom' . $icdunit['id_kuk'], true);
            $nilai = $this->input->post('nilai' . $icdunit['id_kuk'], true);
            if ($kom != "") {
                if ($jcdia >= 1) {
                    $data = array(
                        'kompetensi' => $kom,
                        'nilai' => $nilai
                    );
                    $this->Maksesasesor->editfria01($data, $icdunit['id_kuk'], $id_asesi);
                    $update++;
                } else {
                    $data = array(
                        'kompetensi' => $kom,
                        'nilai' => $nilai,
                        'id_asesi' => $id_asesi,
                        'id_kuk' => $icdunit['id_kuk'],
                        'id_unit' => $id_unit
                    );
                    $this->Maksesasesor->addfria01($data);
                    $add++;
                }
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria01/' . $id_asesi) . "';
        </script>";
    }

    public function ak02_process()
    {
        $id_asesor = $this->Masesor->getidasesor($this->session->userdata('id_user'));
        $id_asesi = $this->input->post('id_asesi', true);
        $catatan = $this->input->post('catatan', true);
        $tindakan = $this->input->post('tindakan', true);
        $kompetensi = $this->input->post('kompetensi', true);
        $ttd_asesor = $this->input->post('ttd', true);
        $id_asesi = $this->input->post('id_asesi', true);
        $dataserti = $this->Maksesasesi->getpaket($id_asesi);
        $pcdia = $this->db->query("SELECT * FROM fr_ak_02 where id_asesi='" . $id_asesi . "'");
        $jcdia = $pcdia->num_rows();
        if ($jcdia >= 1) {
            $data = array(
                'id_asesor' => $id_asesor,
                'catatan' => $catatan,
                'tindakan' => $tindakan,
                'kompetensi' => $kompetensi,
                'ttd_asesor' => $ttd_asesor,
                'tgl_putusan' => date('Y-m-d')
            );
            $this->Maksesasesor->editfrak02($data, $id_asesi);
            echo "
                    <script>
                        alert('Berhasil Mengubah data Putusan');
                        document.location.href = '" . base_url('aksesasesor/daftar_asesi/' . $dataserti['id_paket']) . "';
                    </script>";
        } else {
            $data = array(
                'id_asesi' => $id_asesi,
                'id_asesor' => $id_asesor,
                'catatan' => $catatan,
                'tindakan' => $tindakan,
                'kompetensi' => $kompetensi,
                'ttd_asesor' => $ttd_asesor,
                'tgl_putusan' => date('Y-m-d')
            );
            $this->Maksesasesor->addfrak02($data);
            echo "
                    <script>
                        alert('Berhasil Menyimpan data Putusan');
                        document.location.href = '" . base_url('aksesasesor/daftar_asesi/' . $dataserti['id_paket']) . "';
                    </script>";
        }
    }

    public function ia03save()
    {
        $add = 0;
        $update = 0;
        $id_asesi = $this->input->post('id_asesi', true);
        $umpan_balik = $this->input->post('umpan_balik', true);
        $id_skema = $this->input->post('id_skema', true);
        $datafria03 = $this->Mfria03->getfria03($id_skema);
        foreach ($datafria03 as $df) {
            $jia03 = $this->Maksesasesor->getCountRefIa03($df->id, $id_asesi);
            $kom = $this->input->post('kom' . $df->id, true);
            $jawaban = $this->input->post('jawaban' . $df->id, true);
            if ($kom != "") {
                if ($jia03 >= 1) {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban,
                        'umpan_balik' => $umpan_balik
                    );
                    $this->Maksesasesor->editfria03($data, $df->id, $id_asesi);
                    $update++;
                } else {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban,
                        'id_asesi' => $id_asesi,
                        'id_ia' => $df->id,
                        'id_unit' => $df->id_unit,
                        'umpan_balik' => $umpan_balik
                    );
                    $this->Maksesasesor->addfria03($data);
                    $add++;
                }
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria03/' . $id_asesi) . "';
        </script>";
    }

    public function ia06save()
    {
        $add = 0;
        $update = 0;
        $id_asesi = $this->input->post('id_asesi', true);
        $id_skema = $this->input->post('id_skema', true);
        $datafria06 = $this->Mfria06->getfria06($id_skema);
        foreach ($datafria06 as $df) {
            $jia06 = $this->Maksesasesor->getCountRefIa06($df->id, $id_asesi);
            $kom = $this->input->post('kom' . $df->id, true);
            $jawaban = $this->input->post('jawaban' . $df->id, true);
            if ($kom != "") {
                if ($jia06 >= 1) {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban
                    );
                    $this->Maksesasesor->editfria06($data, $df->id, $id_asesi);
                    $update++;
                } else {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban,
                        'id_asesi' => $id_asesi,
                        'id_ia' => $df->id,
                        'id_unit' => $df->id_unit
                    );
                    $this->Maksesasesor->addfria06($data);
                    $add++;
                }
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria06/' . $id_asesi) . "';
        </script>";
    }

    public function ia07save()
    {
        $add = 0;
        $update = 0;
        $id_asesi = $this->input->post('id_asesi', true);
        $id_skema = $this->input->post('id_skema', true);
        $datafria07 = $this->Mfria07->getfria07($id_skema);
        foreach ($datafria07 as $df) {
            $jia07 = $this->Maksesasesor->getCountRefIa07($df->id, $id_asesi);
            $kom = $this->input->post('kom' . $df->id, true);
            $jawaban = $this->input->post('jawaban' . $df->id, true);
            if ($kom != "") {
                if ($jia07 >= 1) {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban
                    );
                    $this->Maksesasesor->editfria07($data, $df->id, $id_asesi);
                    $update++;
                } else {
                    $data = array(
                        'kompetensi' => $kom,
                        'jawaban' => $jawaban,
                        'id_asesi' => $id_asesi,
                        'id_ia' => $df->id,
                        'id_unit' => $df->id_unit
                    );
                    $this->Maksesasesor->addfria07($data);
                    $add++;
                }
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria07/' . $id_asesi) . "';
        </script>";
    }

    public function ia05save()
    {
        $add = 0;
        $update = 0;
        $id_asesi = $this->input->post('id_asesi', true);
        $id_skema = $this->input->post('id_skema', true);
        $datafria05 = $this->Mfria05->getfria05($id_skema);
        foreach ($datafria05 as $df) {
            $jia05 = $this->Maksesasesor->getCountRefIa05($df->id, $id_asesi);
            $kom = $this->input->post('kom' . $df->id, true);
            $jawaban = $this->input->post('jawab' . $df->id, true);
            if ($kom == "") {
                if ($df->kunci == $jawaban) {
                    $kom = "K";
                } else {
                    $kom = "BK";
                }
            }
            if ($jia05 >= 1) {
                $data = array(
                    'kompetensi' => $kom,
                    'jawaban' => $jawaban
                );
                $this->Maksesasesor->editfria05($data, $df->id, $id_asesi);
                $update++;
            } else {
                $data = array(
                    'kompetensi' => $kom,
                    'jawaban' => $jawaban,
                    'id_asesi' => $id_asesi,
                    'id_ia' => $df->id,
                    'id_unit' => $df->id_unit
                );
                $this->Maksesasesor->addfria05($data);
                $add++;
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria05/' . $id_asesi) . "';
        </script>";
    }

    public function ia01set($id_asesi)
    {
        $add = 0;
        $update = 0;
        $dataskema = $this->Maksesasesi->getskema($id_asesi);
        $dataunit = $this->Mskema->getunit($dataskema['id_skema']);
        foreach ($dataunit as $du) {
            $pcdunit = $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_kuk left join tb_elemen on (tb_kuk.id_elemen=tb_elemen.id) where id_unit='" . $du->id . "'")->result_array();
            foreach ($pcdunit as $icdunit) {
                $pcdia = $this->db->query("SELECT * FROM fr_ia_01 where id_asesi='" . $id_asesi . "' and id_kuk='" . $icdunit['id_kuk'] . "'");
                $jcdia = $pcdia->num_rows();
                if ($jcdia >= 1) {
                    $data = array(
                        'kompetensi' => 'K'
                    );
                    $this->Maksesasesor->editfria01($data, $icdunit['id_kuk'], $id_asesi);
                    $update++;
                } else {
                    $data = array(
                        'kompetensi' => 'K',
                        'id_asesi' => $id_asesi,
                        'id_kuk' => $icdunit['id_kuk'],
                        'id_unit' => $du->id
                    );
                    $this->Maksesasesor->addfria01($data);
                    $add++;
                }
            }
        }
        $Pesan = $add . " data ditambahkan, " . $update . " data diubah";
        echo "
        <script>
            alert('$Pesan');
            document.location.href = '" . base_url('aksesasesor/fria01/' . $id_asesi) . "';
        </script>";
    }
}
