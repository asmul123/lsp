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
    function getskema($id)
    {
        $this->db->select('*, tb_sertifikasi.id as idser');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_paket', 'tb_sertifikasi.id_paket=tb_paket.id');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row_array();
    }

    function getjadwal($id)
    {
        $this->db->select('tb_sertifikasi.id');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_paket', 'tb_sertifikasi.id_paket=tb_paket.id');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getcountapl01($id)
    {
        $this->db->select('id');
        $this->db->from('tb_apl_01');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->num_rows();
    }

    function getbuktiasesi($id, $idasesi)
    {
        $this->db->select('*');
        $this->db->from('tb_bukti_asesi');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function hapusbukti($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_bukti_asesi');
    }

    function addapl01($data)
    {
        $this->db->insert('tb_apl_01', $data);
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
}
