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

    function getTest($id)
    {
        $this->db->select('*');
        $this->db->join('tb_jenis_test', 'tb_jenis_test.id_jenis = tb_daftar_test.id_jenis');
        $this->db->where('id_paket', $id);
        $query = $this->db->get('tb_daftar_test');
        return $query->result_array();
    }

    function getTestDetail($id)
    {
        $this->db->select('*');
        $this->db->join('tb_jenis_test', 'tb_jenis_test.id_jenis = tb_daftar_test.id_jenis');
        $this->db->where('id', $id);
        $query = $this->db->get('tb_daftar_test');
        return $query->row_array();
    }

    function getJenisTest($id)
    {
        $this->db->select('*');
        $this->db->where('id_jenis', $id);
        $query = $this->db->get('tb_jenis_test');
        return $query->row_array();
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

    function getCountUnitIa03($idas, $idunit, $kom)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_unit', $idunit);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_03');
        return $query->num_rows();
    }

    function getCountUnitIa05($idas, $idunit, $kom)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_unit', $idunit);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_05');
        return $query->num_rows();
    }

    function getCountUnitIa06($idas, $idunit, $kom)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_unit', $idunit);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_06');
        return $query->num_rows();
    }

    function getCountUnitIa07($idas, $idunit, $kom)
    {
        $this->db->select('id');
        $this->db->where('id_asesi', $idas);
        $this->db->where('id_unit', $idunit);
        $this->db->where('kompetensi', $kom);
        $query = $this->db->get('fr_ia_07');
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

    function getCountIa03Unit($id)
    {
        $this->db->select('id');
        $this->db->where('id_unit', $id);
        $query = $this->db->get('tb_ia_03');
        return $query->num_rows();
    }

    function getCountIa05Unit($id)
    {
        $this->db->select('id');
        $this->db->where('id_unit', $id);
        $query = $this->db->get('tb_ia_05');
        return $query->num_rows();
    }

    function getCountIa06Unit($id)
    {
        $this->db->select('id');
        $this->db->where('id_unit', $id);
        $query = $this->db->get('tb_ia_06');
        return $query->num_rows();
    }

    function getCountIa07Unit($id)
    {
        $this->db->select('id');
        $this->db->where('id_unit', $id);
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

    function getAk02($id)
    {
        $this->db->select('*');
        $this->db->where('id_asesi', $id);
        $query = $this->db->get('fr_ak_02');
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

    function addfrak02($data)
    {
        $this->db->insert('fr_ak_02', $data);
    }

    function editfrak02($data, $idasesi)
    {
        $this->db->where('id_asesi', $idasesi);
        $this->db->update('fr_ak_02', $data);
    }

    function addtest($data)
    {
        $this->db->insert('tb_daftar_test', $data);
    }

    function edittest($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_daftar_test', $data);
    }

    function releasetoken($data, $idtest)
    {
        $this->db->where('id', $idtest);
        $this->db->update('tb_daftar_test', $data);
    }
}
