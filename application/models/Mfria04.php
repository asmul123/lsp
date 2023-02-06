<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria04 extends CI_Model
{

    function getfria04($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_04 where id_skema='$id_skema'")->result();
    }

    function getdetailfria04($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_04 where id='$id'")->row_array();
    }

    function addfria04($data)
    {
        $this->db->insert('tb_ia_04', $data);
    }

    function editfria04($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_04', $data);
    }

    function delia04($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_04');
    }
}
