<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manggota extends CI_Model
{

    function getstruktur()
    {
        return $this->db->query("SELECT * FROM tb_struktur order by urutan ASC")->result();
    }

    function getstrukturdetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_struktur');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function hapusfoto($id)
    {
        $this->db->select('foto');
        $this->db->from('tb_struktur');
        $this->db->where('id', $id);
        $this->db->where('foto !=', 'noimage.png');
        $query = $this->db->get()->row_array();
        unlink('./assets/img/anggota/' . $query['foto']);
    }

    function addanggota($data)
    {
        $this->db->insert('tb_struktur', $data);
    }

    function delanggota($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_struktur');
    }

    function editanggota($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_struktur', $data);
    }
}
