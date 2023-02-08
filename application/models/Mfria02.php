<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria02 extends CI_Model
{

    function getfria02($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_02 where id_skema='$id_skema'")->result();
    }

    function getdetailfria02($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_02 where id='$id'")->row_array();
    }

    function addfria02($data)
    {
        $this->db->insert('tb_ia_02', $data);
    }

    function editfria02($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_02', $data);
    }

    function delia02($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_02');
    }

    function repair_skema()
    {
        $no = 0;
        $gagal = 0;
        $this->db->select('*');
        $this->db->from('tb_ia_02');
        $this->db->where('daftar_unit >', '0');
        $query = $this->db->get()->result_array();
        if ($query) {
            foreach ($query as $q) :
                // echo $q['daftar_unit'] . "<br>";
                $this->db->select('id_skema');
                $this->db->from('tb_unit');
                $this->db->where('id', intval($q['daftar_unit']));
                $r = $this->db->get()->row_array();
                $data = array(
                    'id_skema' => $r['id_skema'],
                    'daftar_unit' => '#' . $q['daftar_unit']
                );
                $this->db->where('id', $q['id']);
                $this->db->update('tb_ia_02', $data);
                $no++;
            endforeach;
        } else {
            $gagal++;
        }
        return "berhasil memperbaharui : " . $no . " data, gagal : " . $gagal . " data";
    }
}
