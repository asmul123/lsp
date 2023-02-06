<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mmapa01 extends CI_Model
{

    function getcoutmapa011($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_1 where id_skema='$id_skema'")->num_rows();
    }

    function getmapa011($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_1 where id_skema='$id_skema'")->row_array();
    }

    function getmapa012($id_kuk)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_2 where id_kuk='$id_kuk'")->result_array();
    }

    function getmapa013($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_3 where id_skema='$id_skema'")->row_array();
    }

    function getdetailmapa012($id)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_2 where id='$id'")->row_array();
    }

    function getcoutkuk($id_skema)
    {
        return $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_elemen left join tb_unit on (tb_elemen.id_unit=tb_unit.id) right join tb_kuk on (tb_elemen.id=tb_kuk.id_elemen) where id_skema='$id_skema'")->num_rows();
    }

    function getkukunit($id_unit)
    {
        return $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_elemen left join tb_kuk on (tb_elemen.id=tb_kuk.id_elemen) where id_unit='$id_unit'")->num_rows();
    }

    function getcoutbukti($id_skema)
    {
        $query = $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_elemen left join tb_unit on (tb_elemen.id_unit=tb_unit.id) right join tb_kuk on (tb_elemen.id=tb_kuk.id_elemen) where id_skema='$id_skema'")->result_array();
        $jmlbukti = 0;
        foreach ($query as $q) :
            $query2 = $this->db->query("SELECT * FROM tb_mapa_01_2 where id_kuk='" . $q["id_kuk"] . "'")->num_rows();
            $jmlbukti = $jmlbukti + $query2;
        endforeach;
        return $jmlbukti;
    }

    function getbuktiunit($id_unit)
    {
        $query = $this->db->query("SELECT tb_kuk.id as id_kuk FROM tb_elemen left join tb_kuk on (tb_elemen.id=tb_kuk.id_elemen) where id_unit='$id_unit'")->result_array();
        $jmlbukti = 0;
        foreach ($query as $q) :
            $query2 = $this->db->query("SELECT * FROM tb_mapa_01_2 where id_kuk='" . $q["id_kuk"] . "'")->num_rows();
            $jmlbukti = $jmlbukti + $query2;
        endforeach;
        return $jmlbukti;
    }

    function getcoutmapa013($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_3 where id_skema='$id_skema'")->num_rows();
    }

    function getcoutmapa012($id_kuk)
    {
        return $this->db->query("SELECT * FROM tb_mapa_01_2 where id_kuk ='$id_kuk'")->num_rows();
    }

    function addmapa011($data)
    {
        $this->db->insert('tb_mapa_01_1', $data);
    }

    function editmapa011($data, $id)
    {
        $this->db->where('id_skema', $id);
        $this->db->update('tb_mapa_01_1', $data);
    }

    function addmapa012($data)
    {
        $this->db->insert('tb_mapa_01_2', $data);
    }

    function editmapa012($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_mapa_01_2', $data);
    }

    function addmapa013($data)
    {
        $this->db->insert('tb_mapa_01_3', $data);
    }

    function editmapa013($data, $id)
    {
        $this->db->where('id_skema', $id);
        $this->db->update('tb_mapa_01_3', $data);
    }

    function delbukti($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_mapa_01_2');
    }
}
