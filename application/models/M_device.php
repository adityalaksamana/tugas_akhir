<?php

class M_device extends CI_Model
{
    private $_table = "tb_device";

    public function getAllData(){
        $this->db->select('*');
        $this->db->from("tb_device");
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getDataDevice($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->from("tb_device");
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function delete($id){
        $this->db->where('id_device', $id);
        $this->db->delete('tb_device');
        return TRUE;
    }

    public function add($namaPerangkat){        
        $dataku = array('id_device'=>'','nama'=>$namaPerangkat);
        $this->db->insert('tb_device', $dataku);
        return TRUE;
    }

    public function edit($id, $namaPerangkat){        
        $dataku = array('nama'=>$namaPerangkat);
        $this->db->where('id_device', $id);
        $this->db->update('tb_device', $dataku);
        return TRUE;
    }
}