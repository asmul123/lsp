<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mmapa02 extends CI_Model
{

    function getcoutmapa02($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_02 where id_skema='$id_skema'")->num_rows();
    }

    function getmapa02($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_mapa_02 where id_skema='$id_skema'")->row_array();
    }

    function getrefmapa02()
    {
        return $this->db->query("SELECT * FROM ref_mapa_02")->result_array();
    }

    function addmapa02($data)
    {
        $this->db->insert('tb_mapa_02', $data);
    }

    function editmapa02($data, $id)
    {
        $this->db->where('id_skema', $id);
        $this->db->update('tb_mapa_02', $data);
    }
}
