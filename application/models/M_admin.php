<?php

class M_admin extends CI_Model
{
    private $_table = "tb_user";

    public function getAllData(){
        $this->db->select('*');
        $this->db->join('tb_level', 'tb_user.id_level = tb_level.id_level');
        $this->db->where('nama_level', 'admin');
        $data = $this->db->get("tb_user")->result_array();
        return $data;
    }

    public function getDevisi($id){
        $this->db->select('*');
        $this->db->join('tb_device', 'tb_device.id_device = tb_devisi.id_device');
        $this->db->where('id_user', $id);
        $data = $this->db->get("tb_devisi")->result_array();
        return $data;
    }

    public function deleteDevisi($id){
        $this->db->where('id_user', $id);
        $this->db->delete('tb_devisi');
        return TRUE;
    }

    public function add($username, $password, $nama){        
        $dataku = array('id_user'=>'','username'=>$username,'nama'=>$nama,'password'=>$password,'id_level'=>'2');
        $this->db->insert('tb_user', $dataku);
        return TRUE;
    }

    public function getIdAdmin($username, $password){        
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from("tb_user");
        $data = $this->db->get()->result_array();
        return $data[0]['id_user'];
    }

    public function delete($id){
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
        return TRUE;
    }
    
    public function getDataAdmin($id){
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $this->db->from("tb_user");
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function password($id, $password){        
        $dataku = array('password'=>$password);
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $dataku);
        return TRUE;
    }

    public function edit($id, $dataku){        
        // $dataku = array('username'=>$username);
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $dataku);
        return TRUE;
    }
}