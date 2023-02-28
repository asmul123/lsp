<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mapl01 extends CI_Model
{

    function getpersyaratan($id_skema)
    {
        $this->db->select('*');
        $this->db->from('tb_bukti');
        $this->db->where('id_skema', $id_skema);
        return $this->db->get()->result_array();
    }

    function getapl01asesi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_apl_01');
        $this->db->join('tb_approve_apl01', 'tb_approve_apl01.id_asesi = tb_apl_01.id_asesi');
        $this->db->join('tb_asesi', 'tb_asesi.id = tb_apl_01.id_asesi');
        $this->db->where('tb_apl_01.id_asesi', $id);
        return $this->db->get()->row();
    }

    function getpersyaratanById($id)
    {
        $this->db->select('*');
        $this->db->from('tb_bukti');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    function addpersyaratan($data)
    {
        $this->db->insert('tb_bukti', $data);
    }

    function editpersyaratan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_bukti', $data);
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_bukti');
    }
}
