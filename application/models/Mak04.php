<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mak04 extends CI_Model
{
    function getak04($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ak_04 where id_skema='$id_skema'")->row_array();
    }

    function getcountak04($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ak_04 where id_skema='$id_skema'")->num_rows();
    }

    function addak04($data)
    {
        $this->db->insert('tb_ak_014', $data);
    }

    function editak04($data, $id)
    {
        $this->db->where('id_skema', $id);
        $this->db->update('tb_ak_04', $data);
    }
}
