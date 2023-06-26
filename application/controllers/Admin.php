<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata['level']=="superadmin"){
            $data = $this->m_admin->getAllData();
            $dataview = array('title' => 'Admin',
                              'subtitle' => 'Daftar seluruh akun dengan role \'admin\' ada di sini. Pilih dan atur sesuai kebutuhan anda!',
                              'content' =>'page/admin',
                              'menu' =>'admin',
                              'data' => $data
                             );
            $this->load->view('layout', $dataview);
        }else{
            redirect(base_url());
        }
    }

    public function add()
    {
        if($this->session->userdata['level']=="superadmin"){
            if($this->input->post()){
                $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $devices = $this->input->post('device');

                // echo $username."<br>";
                // print_r($device);

                $password = password_hash($username, PASSWORD_DEFAULT);

                if($this->m_admin->add($username, $password, $nama)){
                    // redirect(base_url('device'));
                    $id = $this->m_admin->getIdAdmin($username, $password);
                    echo $id;
                    foreach($devices as $device) {
                        $data= array(
                            'id' => '',
                            'id_user' => $id,
                            'id_device' => $device
                        );
                        $this->db->insert('tb_devisi', $data);
                    }
                }
                redirect(base_url('admin'));
            }else{
                $data = $this->m_device->getAllData();
                $dataview = array('title' => 'Tambah Admin',
                                  'subtitle' => 'Lengkapi data admin di sini dan akun admin baru anda siap digunakan!',
                                  'content' =>'page/adminAdd',
                                  'menu' =>'admin',
                                  'data' => $data,
                                 );
                $this->load->view('layout', $dataview);
            }
        }else{
            redirect(base_url());
        }
    }

    public function edit()
    {
        if($this->session->userdata['level']=="superadmin"){
            if($this->input->post()){
                $id = $this->uri->segment(3);
                $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $devices = $this->input->post('device');

                $this->m_admin->deleteDevisi($id);

                foreach($devices as $device) {
                    $data= array(
                        'id' => '',
                        'id_user' => $id,
                        'id_device' => $device
                    );
                    $this->db->insert('tb_devisi', $data);
                }

                $data = array('username' => $username, 'nama' => $nama);
                $this->m_admin->edit($id, $data);

                redirect(base_url('admin'));

            }else{
                $id = $this->uri->segment(3);
                $dataku = $this->m_admin->getDataAdmin($id);
                $dataDevice = $this->m_device->getAllData();
                $dataview = array('title'   => 'Edit Admin',
                                  'subtitle' => 'Perbarui data akun admin di sini dan atur sesuai kebutuhan anda!',
                                  'content' => 'page/adminEdit',
                                  'menu'    => 'admin',
                                  'data'    => $dataku[0],
                                  'dataDevice' => $dataDevice,
                                  'id'      => $id
                                 );
                $this->load->view('layout', $dataview);
            }
        }else{
            redirect(base_url());
        }
    }

    public function delete()
    {
        if($this->session->userdata['level']=="superadmin"){
            $id = $this->uri->segment(3);
            $data = $this->m_client->getAllData($id);

            foreach ($data as $key => $value) {
                // echo $value['id_client']."<br>";
                $this->m_admin->delete($value['id_client']);
            }
            $this->m_admin->delete($id);
            redirect(base_url('admin'));
        }else{
            redirect(base_url());
        }
    }
}