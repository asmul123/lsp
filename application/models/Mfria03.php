<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria03 extends CI_Model
{

    function getfria03($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_03 where id_skema='$id_skema'")->result();
    }

    function getdetailfria03($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_03 where id='$id'")->row_array();
    }

    function addfria03($data)
    {
        $this->db->insert('tb_ia_03', $data);
    }

    function editfria03($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_03', $data);
    }

    function delia03($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_03');
    }
}
