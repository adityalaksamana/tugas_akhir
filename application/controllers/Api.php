<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function getDevice()
    {
        $id = $this->uri->segment(3);
        // echo $id."<br>";
        $data = $this->m_device->getDataDevice($id);
        echo json_encode($data[0]);
    }

    public function getDataSlave()
    {
        $id = $this->uri->segment(3);
        $dataSlave = $this->m_data->getDataSlave($id);
        // print_r($dataSlave);
        echo json_encode($dataSlave);
    }

    public function sendMaster()
    {
        $id = $this->input->get('id');

        $relay = $this->input->get('relay');
        $value = $this->input->get('value');

        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");

        if($this->m_data->getDataMaster($id)){
            $dataRelay = $this->m_data->getLastData($id);
            // print_r($dataRelay);
            $dataRelay = json_decode($dataRelay, true);
            // echo "<br>";
            // print_r($dataRelay);
            
            $dataRelay[$relay] = $value;
            // echo "<br>";
            // print_r($dataRelay);
        }else{
            $dataRelay = $this->m_data->getLastData2($id);
            // print_r($dataRelay);
            $dataRelay = json_decode($dataRelay, true);
            // echo "<br>";
            // print_r($dataRelay);
            
            $dataRelay[$relay] = $value;
        }

        $data = array(
            'id'=>'',
            'id_device'=>$id,
            'waktu'=>$waktu,
            'master'=>True,
            'relay'=>json_encode($dataRelay),
        );

        $this->m_data->add($data);
        // echo json_encode($data);
        $dataSlave = $this->m_data->getDataSlave($id);
        // echo json_encode($data);
        echo json_encode($dataSlave);
    }

    public function sendSlave()
    {
        $id = $this->input->get('id');

        $ph = $this->input->get('ph');
        $tds = $this->input->get('tds');
        $suhu = $this->input->get('suhu');
        $ntu = $this->input->get('ntu');
        $hc = $this->input->get('hc');

        $sph = $this->input->get('sph');
        $stds = $this->input->get('stds');
        $ssuhu = $this->input->get('ssuhu');
        $sntu = $this->input->get('sntu');
        $shc = $this->input->get('shc');


        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $dataRelay = array();

        for ($i=1; $i <=3 ; $i++) { 
            $dataRelay["".$i] = $this->input->get('r'.$i);
        }

        $data = array(
            'id'=>'',
            'id_device'=>$id,
            'waktu'=>$waktu,
            'master'=>False,
            'relay'=>json_encode($dataRelay),
            'ph' => $ph,
            'tds' => $tds,
            'suhu' => $suhu,
            'ntu' => $ntu,
            'hc' => $hc,
            'status_ph' => $sph,
            'status_tds' => $stds,
            'status_suhu' => $ssuhu,
            'status_ntu' => $sntu,
            'status_hc' => $shc,
        );

        $this->m_data->add($data);
        // echo json_encode($data);
        if($this->m_data->getDataMaster($id)){
            $dataMaster = $this->m_data->getDataMaster($id);
            $data = array('status'=>'OK', 'data'=>$dataMaster[0]['relay']);
            // echo json_encode($data);       
            // echo $dataMaster[0]['relay'];
            echo "@";
            foreach(json_decode($dataMaster[0]['relay'], true) as $key => $value){
                echo $value;
            }
            echo "#";       
        }else{
            // $data = array('status'=>'GAGAL');
            echo "GAGAL";
        }
    }
}