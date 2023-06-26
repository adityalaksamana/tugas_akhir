<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata['level']=="admin"){
            $data = $this->m_device->getAllData();
            $dataview = array('title' => 'Perangkat',
                              'subtitle' => 'Daftar seluruh perangkat anda ada di sini. Pilih dan atur sesuai kebutuhan anda!',
                              'content' =>'page/device',
                              'menu' =>'perangkat',
                              'data' => $data
                             );
            $this->load->view('layout', $dataview);
        }else if($this->session->userdata['level']=="xadmin"){
            $data = $this->m_admin->getDevisi($this->session->userdata['user_logged']->id_user);
            $dataview = array('title' => 'Perangkat',
                              'subtitle' => 'Daftar seluruh perangkat anda ada di sini. Pilih dan atur sesuai kebutuhan anda!',
                              'content' =>'page/device',
                              'menu' =>'perangkat',
                              'data' => $data
                             );
            $this->load->view('layout', $dataview);
        // }else if($this->session->userdata['level']=="client"){
        //     $data = $this->m_client->getDevisi($this->session->userdata['user_logged']->id_user);
        //     $dataview = array('title' => 'Perangkat',
        //                       'subtitle' => 'Daftar seluruh perangkat anda ada di sini. Pilih dan atur sesuai kebutuhan anda!',
        //                       'content' =>'page/device',
        //                       'menu' =>'perangkat',
        //                       'data' => $data
        //                      );
        //     $this->load->view('layout', $dataview);

        }else{
            redirect(base_url());
        }
    }

    public function histori()
    {
        if($this->session->userdata['level']=="admin"){
            $id = $this->uri->segment(3);
            $data = $this->m_data->getAllData($id);
            $dataview = array('title' => 'Histori',
                              'subtitle' => 'Daftar seluruh data pada device ada di sini.',
                              'content' =>'page/deviceHistori',
                              'menu' =>'perangkat',
                              'data' => $data
                             );
            $this->load->view('layout', $dataview);
        }else if($this->session->userdata['level']=="client"){
            $data = $this->m_admin->getDevisi($this->session->userdata['user_logged']->id_user);
            // print_r($data);

            $listDevice = [];
            foreach ($data as $key => $value) {
                array_push($listDevice, $value['id_device']);
            }
            $id = $this->uri->segment(3);

            if(in_array($id, $listDevice)){
                $dataview = array('title' => 'Histori',
                                  'subtitle' => 'Daftar seluruh data pada device ada di sini.',
                                  'content' =>'page/deviceHistori',
                                  'menu' =>'perangkat',
                                  'data' => $data
                                 );
                $this->load->view('layout', $dataview);
            }else{
                redirect(base_url());
            }

        // }else if($this->session->userdata['level']=="client"){
        //     $data = $this->m_client->getDevisi($this->session->userdata['user_logged']->id_user);
        //     $dataview = array('title' => 'Perangkat',
        //                       'subtitle' => 'Daftar seluruh perangkat anda ada di sini. Pilih dan atur sesuai kebutuhan anda!',
        //                       'content' =>'page/device',
        //                       'menu' =>'perangkat',
        //                       'data' => $data
        //                      );
        //     $this->load->view('layout', $dataview);
        }else{
            redirect(base_url());
        }
    }

    public function gethistori()
    {
        $id = $this->input->get('id');
        $hari = $this->input->get('hari');
        $hari2 = $this->input->get('hari2');
        
        // echo $id."<br>";
        // echo $hari."<br>";
        // echo $hari2."<br>";

        $data = $this->m_data->getDataHistori($id, $hari, $hari2);
        // print_r($data);
        $waktu = [];
        $r1 = [];
        $r2 = [];
        $r3 = [];
        $ph = [];
        $tds = [];
        $suhu = [];
        $ntu = [];
        $hc = [];
        foreach ($data as $key => $value) {
            array_push($waktu, $value['waktu']);

            $hasil = json_decode($value['relay'], true);
            array_push($r1, $hasil[1]);
            array_push($r2, $hasil[2]);
            array_push($r3, $hasil[3]);
            
            array_push($ph, $value['ph']);
            array_push($tds, $value['tds']);
            array_push($suhu, $value['suhu']);
            array_push($ntu, $value['ntu']);
            array_push($hc, $value['hc']);
        }
        echo json_encode([$waktu, $r1, $r2, $r3, $ph, $tds, $suhu, $ntu, $hc]);
    }

    public function deletehistori()
    {
        $id = $this->input->get('id');
        $hari = $this->input->get('hari');
        $hari2 = $this->input->get('hari2');
        
        // echo $id."<br>";
        // echo $hari."<br>";
        // echo $hari2."<br>";

        $this->m_data->deleteDataHistori($id, $hari, $hari2);
        echo json_encode(["OK"]);
    }

    public function add()
    {
        if($this->session->userdata['level']=="admin"){
            if($this->input->post()){
                $namaPerangkat = $this->input->post('namaPerangkat');
                $arrayKu = array();

                if($this->m_device->add($namaPerangkat)){
                    redirect(base_url('device'));
                }
            }else{
                $dataview = array('title' => 'Tambah Perangkat',
                                  'subtitle' => 'Lengkapi data perangkat anda di sini dan perangkat baru anda siap digunakan!',
                                  'content' =>'page/deviceAdd',
                                  'menu' =>'perangkat',
                                 );
                $this->load->view('layout', $dataview);
            }
        }else{
            redirect(base_url());
        }
    }

    public function edit()
    {
        if($this->session->userdata['level']!="client"){
            if($this->input->post()){
                $id = $this->uri->segment(3);
                $namaPerangkat = $this->input->post('namaPerangkat');

                if($this->m_device->edit($id, $namaPerangkat)){
                    redirect(base_url('device'));
                }
            }else{
                $id = $this->uri->segment(3);
                $dataku = $this->m_device->getDataDevice($id);
                $dataview = array('title'   => 'Edit Perangkat',
                                  'subtitle' => 'Perbarui data perangkat anda di sini dan atur sesuai kebutuhan anda!',
                                  'content' => 'page/deviceEdit',
                                  'menu'    => 'perangkat',
                                  'data'    => $dataku[0],
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
            $this->m_device->delete($id);
            redirect(base_url('device'));
        }else{
            redirect(base_url());
        }
    }
}