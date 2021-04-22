<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$login = "";
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post('login')==true){
			$this->session->set_userdata('pesan', " ");
			
			//$pengguna = "";
			//print_r($data['semester']);exit;
			
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$pass = md5($pass);
			$login = $this->Sql->login($username, $pass);
		}

		$data['eror'] = $login;
		$this->load->view('login_view', $data);
	}
}
