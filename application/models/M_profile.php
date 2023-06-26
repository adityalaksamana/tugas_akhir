<?php

class M_profile extends CI_Model
{
    private $_table = "tb_user";

    public function getData($id){
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $data = $this->db->get("tb_user")->result_array();
        return $data;
    }

}