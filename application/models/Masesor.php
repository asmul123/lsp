<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Masesor extends CI_Model
{

    function getasesor()
    {
        return $this->db->query("SELECT * FROM tb_asesor order by nama ASC")->result();
    }

    function getasesordetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_asesor');
        $this->db->join('tb_users', 'tb_asesor.id_user = tb_users.id');
        $this->db->where('tb_asesor.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getidasesor($id_user)
    {
        $this->db->select('id');
        $this->db->from('tb_asesor');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->row()->id;
    }

    function hapusfoto($id)
    {
        $this->db->select('foto');
        $this->db->from('tb_asesor');
        $this->db->where('id', $id);
        $this->db->where('foto !=', 'noimage.png');
        $query = $this->db->get()->row_array();
        unlink('./assets/img/asesor/' . $query['foto']);
    }

    function addasesor($data)
    {
        $this->db->insert('tb_asesor', $data);
    }

    function adduser($data)
    {
        $this->db->insert('tb_users', $data);
    }

    function cekIdUser($username)
    {
        $query = $this->db->get_where('tb_users', ['username' => $username])->row();
        return $query;
    }

    function delasesor($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_asesor');
    }

    function deluser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_users');
    }

    function editasesor($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_asesor', $data);
    }

    function edituser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_users', $data);
    }

    function cekNomet($no_met)
    {
        $query = $this->db->get_where('tb_asesor', ['no_met' => $no_met])->row();
        if (empty($query)) {
            return 'kosong';
        } else {
            return 'ada';
        }
    }

    function cekNometU($no_met, $id)
    {
        $this->db->select('*');
        $this->db->from('tb_asesor');
        $this->db->where('no_met', $no_met);
        $this->db->where('id <>', $id);
        $query = $this->db->get()->row();
        if (empty($query)) {
            return 'kosong';
        } else {
            return 'ada';
        }
    }

    function cekUsername($username)
    {
        $query = $this->db->get_where('tb_users', ['username' => $username])->row();
        if (empty($query)) {
            return 'kosong';
        } else {
            return 'ada';
        }
    }

    function cekUsernameU($username, $id)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('username', $username);
        $this->db->where('id <>', $id);
        $query = $this->db->get()->row();
        if (empty($query)) {
            return 'kosong';
        } else {
            return 'ada';
        }
    }

    function cekAkun($id)
    {
        $query = $this->db->get_where('tb_users', ['id' => $id])->row();
        if (empty($query)) {
            return 'kosong';
        } else {
            return 'ada';
        }
    }
}
