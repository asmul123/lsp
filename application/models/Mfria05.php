<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfria05 extends CI_Model
{

    function getfria05($id_skema)
    {
        return $this->db->query("SELECT * FROM tb_ia_05 where id_skema='$id_skema'")->result();
    }

    function getunitfria05($id_skema)
    {
        return $this->db->query("SELECT kode_unit,judul_unit FROM tb_ia_05 join tb_unit on (tb_unit.id=tb_ia_05.id_unit) where tb_ia_05.id_skema='$id_skema' GROUP BY id_unit ASC")->result();
    }

    function getdetailfria05($id)
    {
        return $this->db->query("SELECT * FROM tb_ia_05 where id='$id'")->row_array();
    }

    function addfria05($data)
    {
        $this->db->insert('tb_ia_05', $data);
    }

    function editfria05($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ia_05', $data);
    }

    function delia05($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ia_05');
    }

    function repair_skema()
    {
        $no = 0;
        $gagal = 0;
        $this->db->select('*');
        $this->db->from('tb_ia_05');
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
                $this->db->update('tb_ia_05', $data);
                $no++;
            endforeach;
        } else {
            $gagal++;
        }
        return "berhasil memperbaharui : " . $no . " data, gagal : " . $gagal . " data";
    }
}
