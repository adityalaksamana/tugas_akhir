<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		ob_start();
		// echo "cob";
		if($this->session->userdata('user_logged')){
			if($this->session->userdata['level']=="admin"){
				$data = $this->m_device->getAllData();
			}else if($this->session->userdata['level']=="xadmin"){
	            $data = $this->m_admin->getDevisi($this->session->userdata['user_logged']->id_user);
			}else if($this->session->userdata['level']=="client"){
	            $data = $this->m_client->getDevisi($this->session->userdata['user_logged']->id_user);
			}
			$dataview = array('title' => 'Dashboard',
							  'subtitle' => 'Kontrol perangkat anda di sini! Pilih perangkat anda pada kolom opsi perangkat dan mulai kendalikan setiap komponennya!',
							  'content' =>'page/index',
							  'menu' =>'dashboard',
							  'data' => $data,
								);
			$this->load->view('layout', $dataview);
			// $this->load->view('masuk');
		}else{
		    redirect(base_url('login'));
		}
	}
}
