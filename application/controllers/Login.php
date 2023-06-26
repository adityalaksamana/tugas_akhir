<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array('status'=>'');
        $this->load->view("login", $data);
    }

    public function fail()
    {
        $data = array('status'=>'1');
        $this->load->view("login", $data);
    }

    public function proses()
    {
        // jika form login disubmit
        if($this->input->post()){
        	$username = $this->input->post("username");
        	$password = $this->input->post("password");
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
        	// echo $username."<br>";
        	// echo $password."<br>";
         //    echo $hash_password."<br>";
         //    echo password_hash($password, PASSWORD_DEFAULT)."<br>";
         //    echo password_hash($password, PASSWORD_DEFAULT)."<br>";
        	// echo "ini";

            if($this->m_user->doLogin($username, $password)){
            	redirect(base_url()); 
            }else{
            	redirect(base_url('login/fail'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}