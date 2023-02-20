<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Maksesasesor extends CI_Model
{
    function getJadwal($idasesor)
    {
        $this->db->select('*, count(id_asesi) as jmlasesi');
        $this->db->join('tb_paket', 'tb_paket.id = tb_sertifikasi.id_paket');
        $this->db->where('id_asesor', $idasesor);
        $this->db->group_by('id_paket');
        $query = $this->db->get('tb_sertifikasi');
        return $query->result_array();
    }

    function getAsesi($idpak, $idas)
    {
        $this->db->select('*,tb_asesi.id as idasesi');
        $this->db->join('tb_asesi', 'tb_asesi.id = tb_sertifikasi.id_asesi');
        $this->db->where('id_asesor', $idas);
        $this->db->where('id_paket', $idpak);
        $query = $this->db->get('tb_sertifikasi');
        return $query->result_array();
    }

    function getCountUnitIa01($idas, $idunit, $kom)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_unit', $idunit);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_01');
        return $query->num_rows();
    }

    function getCountIa03($id)
    {
        $this->db->select('id');
        $this->db->where('id_skema', $id);
        $query = $this->db->get('tb_ia_03');
        return $query->num_rows();
    }

    function getCountIa05($id)
    {
        $this->db->select('id');
        $this->db->where('id_skema', $id);
        $query = $this->db->get('tb_ia_05');
        return $query->num_rows();
    }

    function getCountIa06($id)
    {
        $this->db->select('id');
        $this->db->where('id_skema', $id);
        $query = $this->db->get('tb_ia_06');
        return $query->num_rows();
    }

    function getCountIa07($id)
    {
        $this->db->select('id');
        $this->db->where('id_skema', $id);
        $query = $this->db->get('tb_ia_07');
        return $query->num_rows();
    }

    function getCountKompIa01($kom, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_01');
        return $query->num_rows();
    }

    function getCountKompIa03($kom, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_03');
        return $query->num_rows();
    }

    function getCountRefIa03($idia, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_03');
        return $query->num_rows();
    }

    function getCountRefIa05($idia, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_05');
        return $query->num_rows();
    }

    function getCountRefIa06($idia, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_06');
        return $query->num_rows();
    }

    function getCountRefIa07($idia, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_07');
        return $query->num_rows();
    }

    function getRefIa03($idia, $idas)
    {
        $this->db->select('*');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_03');
        return $query->row_array();
    }

    function getRefIa05($idia, $idas)
    {
        $this->db->select('*');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_05');
        return $query->row_array();
    }

    function getRefIa06($idia, $idas)
    {
        $this->db->select('*');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_06');
        return $query->row_array();
    }

    function getRefIa07($idia, $idas)
    {
        $this->db->select('*');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_ia', $idia);
        $query = $this->db->get('fr_ia_07');
        return $query->row_array();
    }

    function getCountKompIa05($kom, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_05');
        return $query->num_rows();
    }

    function getCountKompIa06($kom, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_06');
        return $query->num_rows();
    }

    function getCountKompIa07($kom, $idas)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_07');
        return $query->num_rows();
    }

    function addfria01($data)
    {
        $this->db->insert('fr_ia_01', $data);
    }

    function editfria01($data, $id, $idasesi)
    {
        $this->db->where('id_kuk', $id);
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ia_01', $data);
    }

    function addfria03($data)
    {
        $this->db->insert('fr_ia_03', $data);
    }

    function editfria03($data, $id, $idasesi)
    {
        $this->db->where('id_ia', $id);
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ia_03', $data);
    }

    function addfria05($data)
    {
        $this->db->insert('fr_ia_05', $data);
    }

    function editfria05($data, $id, $idasesi)
    {
        $this->db->where('id_ia', $id);
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ia_05', $data);
    }

    function addfria06($data)
    {
        $this->db->insert('fr_ia_06', $data);
    }

    function editfria06($data, $id, $idasesi)
    {
        $this->db->where('id_ia', $id);
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ia_06', $data);
    }

    function addfria07($data)
    {
        $this->db->insert('fr_ia_07', $data);
    }

    function editfria07($data, $id, $idasesi)
    {
        $this->db->where('id_ia', $id);
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ia_07', $data);
    }
}
