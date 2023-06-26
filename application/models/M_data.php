<?php

class M_data extends CI_Model
{
    public function add($dataku){        
        $this->db->insert('tb_data', $dataku);
        return TRUE;
    }

    public function getDataMaster($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', True);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $data = $this->db->get("tb_data")->result_array();
        return $data;
    }

    public function getDataSlave($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', False);
        $this->db->order_by("id", "desc");
        $this->db->limit(30);
        $data = $this->db->get("tb_data")->result_array();
        return $data;
    }

    public function getLastData($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', True);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $data = $this->db->get("tb_data")->result_array();
        return $data[0]['relay'];
    }

    public function getLastData2($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', False);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $data = $this->db->get("tb_data")->result_array();
        return $data[0]['relay'];
    }

    public function getAllData($id){
        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', False);
        $this->db->order_by("id", "desc");
        // $this->db->limit(30);
        $data = $this->db->get("tb_data")->result_array();
        return $data;
    }

    public function getDataHistori($id, $hari, $hari2){

        // echo $id."<br>";
        // echo $hari."<br>";
        // echo $hari2."<br>";

        $this->db->select('*');
        $this->db->where('id_device', $id);
        $this->db->where('master', False);
        $this->db->order_by("id", "desc");
        $this->db->where('waktu >=', $hari." 00:00:00");
        $this->db->where('waktu <=', $hari2." 23:59:59");
        $data = $this->db->get("tb_data")->result_array();
        return $data;
        // print_r($data);
    }

    public function deleteDataHistori($id, $hari, $hari2){
        $this->db->where('id_device', $id);
        $this->db->where('master', False);
        $this->db->where('waktu >=', $hari." 00:00:00");
        $this->db->where('waktu <=', $hari2." 23:59:59");
        $this->db->delete('tb_data');
        return TRUE;
    }
}