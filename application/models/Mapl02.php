<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mapl02 extends CI_Model
{

    function getapl02approve($id)
    {
        $this->db->select('*, tb_asesi.nama as namaasesi, tb_asesor.nama as namaasesor');
        $this->db->from('tb_approve_apl02');
        $this->db->join('tb_asesi', 'tb_asesi.id = tb_approve_apl02.id_asesi');
        $this->db->join('tb_asesor', 'tb_asesor.id = tb_approve_apl02.id_asesor');
        $this->db->where('id_asesi', $id);
        return $this->db->get()->row();
    }

    function getApl02Asesi($idasesi, $idelemen)
    {
        $this->db->select('kompetensi');
        $this->db->from('tb_apl_02');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id_elemen', $idelemen);
        return $this->db->get()->row();
    }
    

}
