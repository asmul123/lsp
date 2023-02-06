<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria05 extends CI_Model
{

    function getfria05($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_05 where id_skema='$id_skema'")->result();
    }

    function getdetailfria05($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_05 where id='$id'")->row_array();
    }

    function addfria05($data)
    {
        $this->db->insert('tb_ia_05', $data);
    }

    function editfria05($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_05', $data);
    }

    function delia05($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_05');
    }
}
