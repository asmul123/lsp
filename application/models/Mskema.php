<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mskema extends CI_Model
{

    function getskema()
    {
        return $this->db->query("SELECT * FROM tb_skema")->result();
    }

    function getskemaasesor($id)
    {
        return $this->db->query("SELECT * FROM tb_askem left join tb_skema on (tb_skema.id = tb_askem.id_skema) where id_asesor='$id'")->result();
    }

    function getunit($id)
    {
        return $this->db->query("SELECT * FROM tb_unit where id_skema='$id'")->result();
    }

    function getelemen($id)
    {
        return $this->db->query("SELECT * FROM tb_elemen where id_unit='$id' order by urutan ASC")->result();
    }

    function getkuk($id)
    {
        return $this->db->query("SELECT * FROM tb_kuk where id_elemen='$id' order by urutan ASC")->result();
    }

    function getskemadetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_skema');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getunitdetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_unit');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getelemendetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_elemen');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getkukdetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_kuk');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function hapusfile($id)
    {
        $this->db->select('file_skema');
        $this->db->from('tb_skema');
        $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        unlink('./assets/skema/' . $query['file_skema']);
    }

    function addskema($data)
    {
        $this->db->insert('tb_skema', $data);
    }

    function addunitskema($data)
    {
        $this->db->insert('tb_unit', $data);
    }

    function addelemenskema($data)
    {
        $this->db->insert('tb_elemen', $data);
    }

    function addkukskema($data)
    {
        $this->db->insert('tb_kuk', $data);
    }

    function editskema($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_skema', $data);
    }

    function editunitskema($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_unit', $data);
    }

    function editelemenskema($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_elemen', $data);
    }

    function editkukskema($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_kuk', $data);
    }

    function delskema($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_skema');
    }

    function delunitskema($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_unit');
    }

    function delelemenskema($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_elemen');
    }

    function delkukskema($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kuk');
    }

    function cekUnit($id)
    {
        return $query = $this->db->get_where('tb_unit', ['id_skema' => $id])->num_rows();
    }

    function cekElemen($id)
    {
        return $query = $this->db->get_where('tb_elemen', ['id_unit' => $id])->num_rows();
    }

    function cekKUK($id)
    {
        return $query = $this->db->get_where('tb_kuk', ['id_elemen' => $id])->num_rows();
    }

    function cekKUKUnit($id)
    {
        $this->db->select('tb_kuk.id');
        $this->db->from('tb_kuk');
        $this->db->join('tb_elemen', 'tb_elemen.id=tb_kuk.id_elemen');
        $this->db->where('id_unit', $id);
        return $this->db->get()->num_rows();
    }

    function getkategoridokumen()
    {
        return $this->db->query("SELECT * FROM tb_kategori_dokumen")->result();
    }

    function getdokumen($idkat)
    {
        return $this->db->query("SELECT * FROM tb_dokumen where id_kategori='$idkat'")->result();
    }
}
