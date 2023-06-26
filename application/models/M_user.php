<?php

class M_user extends CI_Model
{
    private $_table = "tb_user";

    public function doLogin($username, $password){
		$post = $this->input->post();

        $this->db->select('*');
        $this->db->join('tb_level', 'tb_user.id_level = tb_level.id_level');
        $this->db->where('username', $username);
        $user = $this->db->get("tb_user")->row();

        if($user){
            if (password_verify($password, $user->password)) {
                $isPasswordTrue = 1;
            } else {
                $isPasswordTrue = 0;
            }

            if($isPasswordTrue){ 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['level' => $user->nama_level]);
                return true;
            }
        }
		return false;
    }

    public function apiLogin($username, $password){
        $post = $this->input->post();

        $this->db->select('*');
        $this->db->join('tb_level_user', 'tb_user.id_level_user = tb_level_user.id_level_user');
        $this->db->where('id_user', $username);
        $user = $this->db->get($this->_table)->row();

        if($user){
            if (password_verify($password, $user->password_user)) {
                $isPasswordTrue = 1;
            } else {
                $isPasswordTrue = 0;
            }

            $isAdmin = $user->id_level_user == "1";

            if($isPasswordTrue){ 
                return true;
            }
        }
        return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    public function getAllDataUser($id){
        $this->db->select('*');
        $this->db->from('tb_client');
        $this->db->where('id_user', $id);
        $data = $this->db->get()->result_array();
        // print_r($data);
                // print_r($data);
        $foto = $data[0]['foto'];
        $data[0]['foto'] = $foto;
        return $data[0];
    }

    public function apiGet($id){
        $this->db->select('*');
        $this->db->from('tb_data');
        $this->db->where('id_client', $id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get()->result_array();
        return $data[0];   
    }
}