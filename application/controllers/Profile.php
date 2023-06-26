<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','url');
        $this->load->helper(array('form', 'url', 'file'));
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $status = '';
        if ($this->input->get()) {
            $status = $this->input->get('s');
        }
        $id = $this->session->userdata['user_logged']->id_user;
        $data = $this->m_profile->getData($id);
        $dataview = array('title' => 'Profil',
                          'subtitle' => 'Informasi akun anda ada di sini. Atur sesuai kebutuhan anda!',
                          'content' =>'page/profile',
                          'menu' =>'profil',
                          'data' => $data[0],
                          'id' => $id,
                          'status' => $status
                         );
        $this->load->view('layout', $dataview);
    }

    public function edit()
    {
        if($this->input->post()){
            $id = $this->uri->segment(3);
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');

            $data = array('username' => $username, 'nama' => $nama);

            $this->m_admin->edit($id, $data);

            redirect(base_url('profile'));

        }
    }

    public function editPassword()
    {
        if($this->input->post()){
            $passwordLama = $this->input->post('passwordLama');
            $passwordBaru = $this->input->post('passwordBaru');
            $konfirmasiPassword = $this->input->post('konfirmasiPassword');
            $p = $this->session->userdata['user_logged']->password;
            $id = $this->session->userdata['user_logged']->id_user;
            // echo $passwordBaru."<br>";
            // echo $passwordLama."<br>";
            // echo $konfirmasiPassword."<br>"; 

            if ($passwordLama == $konfirmasiPassword) {
                if(password_verify($passwordLama, $p)){
                    $hash_password = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->m_admin->password($id, $hash_password);

                    $this->session->userdata['user_logged']->password = $hash_password;
                    
                    redirect(base_url('profile?s=2'));
                }else{
                    redirect(base_url('profile?s=1'));
                }
            }else{
                redirect(base_url('profile?s=1'));
            }
        }
    }

    public function editFoto()
    {
        echo "oke<br>";

        $id = $this->session->userdata['user_logged']->id_user;

        $config['upload_path']          = './assets/images/faces/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100;
        $new_name = time().$_FILES["foto"]['name'];
        $config['file_name'] = $new_name;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        // $this->upload->do_upload('foto');

        if ( ! $this->upload->do_upload('foto'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('foto'=>$new_name);
            if($this->m_admin->edit($id, $data)){
                $filenama = $this->session->userdata['user_logged']->foto;
                $path = './assets/images/faces/'.$filenama;
                chmod($path, 0777);
                if($filenama != ''){
                    if (file_exists($path)) {
                        if(unlink($path)){
                            $this->session->userdata['user_logged']->foto = $new_name;
                            redirect(base_url('profile'));
                        } 
                    }
                }else{
                    $this->session->userdata['user_logged']->foto = $new_name;
                    redirect(base_url('profile'));
                }
            }
        }
    }

}