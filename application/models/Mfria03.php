<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria03 extends CI_Model
{

    function getfria03($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_03 where id_skema='$id_skema'")->result();
    }

    function getdetailfria03($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_03 where id='$id'")->row_array();
    }

    function addfria03($data)
    {
        $this->db->insert('tb_ia_03', $data);
    }

    function editfria03($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_03', $data);
    }

    function delia03($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_03');
    }

    function repair_skema()
    {
        $no = 0;
        $gagal = 0;
        $this->db->select('*');
        $this->db->from('tb_ia_03');
        $query = $this->db->get()->result_array();
        if ($query) {
            foreach ($query as $q) :
                // echo $q['id_unit'] . "<br>";
                $this->db->select('id_skema');
                $this->db->from('tb_unit');
                $this->db->where('id', ($q['id_unit']));
                $r = $this->db->get()->row_array();
                $data = array(
                    'id_skema' => $r['id_skema']
                );
                $this->db->where('id', $q['id']);
                $this->db->update('tb_ia_03', $data);
                $no++;
            endforeach;
        } else {
            $gagal++;
        }
        return "berhasil memperbaharui : " . $no . " data, gagal : " . $gagal . " data";
    }
}
