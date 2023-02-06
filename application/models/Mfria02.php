<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria02 extends CI_Model
{

    function getfria02($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_02 where id_skema='$id_skema'")->result();
    }

    function getdetailfria02($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_02 where id='$id'")->row_array();
    }

    function addfria02($data)
    {
        $this->db->insert('tb_ia_02', $data);
    }

    function editfria02($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_02', $data);
    }

    function delia02($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_02');
    }
}
