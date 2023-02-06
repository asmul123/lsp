<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria07 extends CI_Model
{

    function getfria07($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_07 where id_skema='$id_skema'")->result();
    }

    function getdetailfria07($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_07 where id='$id'")->row_array();
    }

    function addfria07($data)
    {
        $this->db->insert('tb_ia_07', $data);
    }

    function editfria07($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_07', $data);
    }

    function delia07($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_07');
    }
}
