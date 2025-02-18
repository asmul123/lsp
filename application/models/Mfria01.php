<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria01 extends CI_Model
{

    function getfria01($id_elemen)
    {
        return $this->db->query("SELECT * FROM tb_ia_01 where id_elemen='$id_elemen'")->row();
    }

    function addfria01($data)
    {
        $this->db->insert('tb_ia_01', $data);
    }

    function editfria01($data, $id)
    {
        $this->db->where('id_elemen', $id);
        $this->db->update('tb_ia_01', $data);
    }

    function getkomia01asesi($idasesi, $idkuk)
    {
        $this->db->select('kompetensi');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id_kuk', $idkuk);
        return $this->db->get('fr_ia_01')->row()->kompetensi;
    }
}
