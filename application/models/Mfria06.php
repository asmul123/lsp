<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria06 extends CI_Model
{

    function getfria06($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_06 where id_skema='$id_skema'")->result();
    }

    function getdetailfria06($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_06 where id='$id'")->row_array();
    }

    function addfria06($data)
    {
        $this->db->insert('tb_ia_06', $data);
    }

    function editfria06($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_06', $data);
    }

    function delia06($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_06');
    }
}
