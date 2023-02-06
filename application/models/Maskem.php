<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Maskem extends CI_Model
{
    function getAll()
    {
        $query = $this->db->query("SELECT *,tb_askem.id as idas FROM tb_askem left join tb_skema on (tb_askem.id_skema=tb_skema.id) right join tb_asesor on (tb_askem.id_asesor = tb_asesor.id) WHERE tb_askem.id<>'' ORDER BY nama ASC");
        return $query->result_array();
    }

    function getDetail($id)
    {
        $query = $this->db->query("SELECT *,tb_askem.id as idas FROM tb_askem left join tb_skema on (tb_askem.id_skema=tb_skema.id) right join tb_asesor on (tb_askem.id_asesor = tb_asesor.id) where tb_askem.id='$id'");
        return $query->row_array();
    }

    function getBYId($id)
    {
        $query = $this->db->get_where('tb_askem', ['id' => $id]);
        return $query->row_array();
    }

    function cekaskem($idse, $idas)
    {
        $query = $this->db->get_where('tb_askem', ['id_skema' => $idse, 'id_asesor' => $idas]);
        return $query->num_rows();
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_askem');
    }

    function tambah($data)
    {
        $this->db->insert('tb_askem', $data);
    }

    function cekrekam($idasesi, $idaskem)
    {
        $this->db->select('*');
        $this->db->from('tb_sertifikasi');
        $this->db->where('id_asesi', $idasesi);
        $this->db->where('id_askem', $idaskem);
        return $this->db->get()->num_rows();
    }

    function ubah($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_askem', $data);
    }
}
