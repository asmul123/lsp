<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mtuk extends CI_Model
{

    function gettuk()
    {
        return $this->db->query("SELECT * FROM tb_tuk")->result();
    }

    function gettukdetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_tuk');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function hapusfoto($id)
    {
        $this->db->select('foto');
        $this->db->from('tb_tuk');
        $this->db->where('id', $id);
        $this->db->where('foto !=', 'noimage.png');
        $query = $this->db->get()->row_array();
        unlink('./assets/img/tuk/' . $query['foto']);
    }

    function addtuk($data)
    {
        $this->db->insert('tb_tuk', $data);
    }

    function deltuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_tuk');
    }

    function edittuk($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_tuk', $data);
    }
}
