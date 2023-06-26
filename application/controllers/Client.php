<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata['level']=="admin"){
            $data = $this->m_client->getAllData();
            $dataview = array('title' => 'Client',
                              'subtitle' => 'Daftar seluruh akun dengan role \'client\' ada di sini. Pilih dan atur sesuai kebutuhan anda!',
                              'content' =>'page/client',
                              'menu' =>'client',
                              'data' => $data
                             );
            $this->load->view('layout', $dataview);
        }else{
            redirect(base_url());
        }
    }

    public function add()
    {
        if($this->session->userdata['level']=="admin"){
            if($this->input->post()){
                $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $devices = $this->input->post('device');

                // echo $username."<br>";
                // print_r($device);

                $password = password_hash($username, PASSWORD_DEFAULT);

                if($this->m_client->add($username, $password, $nama)){
                    // redirect(base_url('device'));
                    $id = $this->m_client->getIdAdmin($username, $password);
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
                redirect(base_url('client'));
            }else{
                $data = $this->m_device->getAllData();
                $dataview = array('title' => 'Tambah Client',
                                  'subtitle' => 'Lengkapi data client di sini dan akun admin baru anda siap digunakan!',
                                  'content' =>'page/clientAdd',
                                  'menu' =>'client',
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
        if($this->session->userdata['level']=="admin"){
            if($this->input->post()){
                $id = $this->uri->segment(3);
                $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $devices = $this->input->post('device');

                $this->m_client->deleteDevisi($id);

                foreach($devices as $device) {
                    $data= array(
                        'id' => '',
                        'id_user' => $id,
                        'id_device' => $device
                    );
                    $this->db->insert('tb_devisi', $data);
                }

                $data = array('username' => $username, 'nama' => $nama);
                $this->m_client->edit($id, $data);

                redirect(base_url('client'));

            }else{
                $id = $this->uri->segment(3);
                $dataku = $this->m_client->getDataAdmin($id);
                $dataDevice = $this->m_device->getAllData();
                $dataview = array('title'   => 'Edit Client',
                                  'subtitle' => 'Perbarui data akun client di sini dan atur sesuai kebutuhan anda!',
                                  'content' => 'page/clientEdit',
                                  'menu'    => 'client',
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
        if($this->session->userdata['level']=="admin"){
            $id = $this->uri->segment(3);
            // $data = $this->m_client->getAllData($id);

            // foreach ($data as $key => $value) {
            //     // echo $value['id_client']."<br>";
            //     $this->m_client->delete($value['id_client']);
            // }
            $this->m_client->delete($id);
            redirect(base_url('client'));
        }else{
            redirect(base_url());
        }
    }
}