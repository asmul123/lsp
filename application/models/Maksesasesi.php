<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Maksesasesi extends CI_Model
{

    function getidasesi($id)
    {
        $this->db->select('id');
        $this->db->from('tb_asesi');
        $this->db->where('id_user', $id);
        return $this->db->get()->row()->id;
    }

    function getApl01Asesi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_apl_01');
        $this->db->join('tb_approve_apl01', 'tb_apl_01.id_asesi=tb_approve_apl01.id_asesi');
        $this->db->where('tb_apl_01.id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getApl02Asesi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_approve_apl02');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getAk01Asesi($id)
    {
        $this->db->select('*,fr_ak_01.id as id, tb_asesi.id as id_asesi');
        $this->db->from('fr_ak_01');
        $this->db->join('tb_asesi', 'tb_asesi.id=fr_ak_01.id_asesi');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getskema($id)
    {
        $this->db->select('*, tb_sertifikasi.id as idser');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_paket', 'tb_sertifikasi.id_paket=tb_paket.id');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getTest($id)
    {
        $this->db->select('*');
        $this->db->join('tb_jenis_test', 'tb_jenis_test.id_jenis = tb_daftar_test.id_jenis');
        $this->db->where('id_paket', $id);
        $query = $this->db->get('tb_daftar_test');
        return $query->result_array();
    }

    function getjadwal($id)
    {
        $this->db->select('tb_sertifikasi.id');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_paket', 'tb_sertifikasi.id_paket=tb_paket.id');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getpaket($id)
    {
        $this->db->select('*');
        $this->db->from('tb_sertifikasi');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getjadwalasesi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_paket', 'tb_sertifikasi.id_paket=tb_paket.id');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getcountapl01($id)
    {
        $this->db->select('id');
        $this->db->from('tb_apl_01');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getcountapl02($id)
    {
        $this->db->select('id');
        $this->db->from('tb_approve_apl02');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getcountak01($id)
    {
        $this->db->select('id');
        $this->db->from('fr_ak_01');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getcountak02($id)
    {
        $this->db->select('id');
        $this->db->from('fr_ak_02');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getasesorasesi($id)
    {
        $this->db->select('id_asesor');
        $this->db->from('tb_sertifikasi');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row()->id_asesor;
    }

    function getbuktiasesi($id, $idasesi)
    {
        $this->db->select('*');
        $this->db->from('tb_bukti_asesi');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function gettestasesi($idasesi, $id)
    {
        $this->db->select('*');
        $this->db->from('tb_status_test');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id_test', $id);
        return $this->db->get();
    }

    function gettestdet($id)
    {
        $this->db->select('*');
        $this->db->from('tb_daftar_test');
        $this->db->join('tb_jenis_test', 'tb_jenis_test.id_jenis=tb_daftar_test.id_jenis');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function getsoalpg($id, $rand = null)
    {
        $this->db->select('*');
        $this->db->from('tb_ia_05');
        $this->db->where('id_skema', $id);
        if ($rand != null) {
            $this->db->order_by('id', 'RANDOM');
        }
        return $this->db->get()->result();
    }

    function cekjawabanpg($id)
    {
        $this->db->select('*');
        $this->db->from('tb_ia_05');
        $this->db->where('id', $id);
        return $this->db->get()->row()->kunci;
    }

    function getsoalessay($id, $rand = null)
    {
        $this->db->select('*');
        $this->db->from('tb_ia_06');
        $this->db->where('id_skema', $id);
        if ($rand != null) {
            $this->db->order_by('id', 'RANDOM');
        }
        return $this->db->get()->result();
    }

    function hapusbukti($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_bukti_asesi');
    }

    function addasesitest($data)
    {
        $this->db->insert('tb_status_test', $data);
    }

    function addapl01($data)
    {
        $this->db->insert('tb_apl_01', $data);
    }

    function addapl02($data)
    {
        $this->db->insert('tb_approve_apl02', $data);
    }

    function addak01($data)
    {
        $this->db->insert('fr_ak_01', $data);
    }

    function addbukti($data)
    {
        $this->db->insert('tb_bukti_asesi', $data);
    }

    function addappapl01($data)
    {
        $this->db->insert('tb_approve_apl01', $data);
    }

    function editapl01($data, $id)
    {
        $this->db->where('id_asesi', $id);
        $this->db->update('tb_apl_01', $data);
    }

    function editappapl01($data, $id)
    {
        $this->db->where('id_asesi', $id);
        $this->db->update('tb_approve_apl01', $data);
    }

    function editapl02($data, $id)
    {
        $this->db->where('id_asesi', $id);
        $this->db->update('tb_approve_apl02', $data);
    }

    function editak01($data, $id)
    {
        $this->db->where('id_asesi', $id);
        $this->db->update('fr_ak_01', $data);
    }

    function addTest($data)
    {
        $this->db->insert('tb_status_test', $data);
    }
}
