<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Sql extends CI_Model{
		function login($username, $pass){
			$this->db->where('username', $username);
			$this->db->where('password',  $pass);
			$query = $this->db->get('dokter');
			$result = $query->row();
			//print_r($result);exit;
			if (!$result) {
				$error_login = "<div class='row' id='pesan'><div style='font-size: 12px;'class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						Username dan/atau Password yang Anda masukkan salah
						</div></div>";
				return $error_login;
			} else {
				$this->session->set_userdata('user', $result);
				redirect("beranda");
			}	
		}
	}