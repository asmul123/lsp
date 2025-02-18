<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mak01 extends CI_Model
{
    function getak01($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ak_01 where id_skema='$id_skema'")->row_array();
    }

    function getak01asesi($idasesi)
    {
        return $this->db->query("SELECT * FROM fr_ak_01 where id_asesi='$idasesi'")->row();
    }

    function getcountak01($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ak_01 where id_skema='$id_skema'")->num_rows();
    }

    function addak01($data)
    {
        $this->db->insert('tb_ak_01', $data);
    }

    function editak01($data, $id)
    {
        $this->db->where('id_skema', $id);
        $this->db->update('tb_ak_01', $data);
    }

}
