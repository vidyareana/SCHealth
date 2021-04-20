<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pesan extends CI_Model{
		/**//**//**//* Pesan sukses *//**//**//**/
		function sukses($isi){
			$this->session->set_userdata('pesan', "<div class='alert alert-success alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
				<h4><i class='icon fa fa-check'></i> Sukses</h4>
				".$isi."
				</div>");
		}
		/**//*** Pesan peringatan/ gagal ***//**/
		function peringatan($isi){
			$this->session->set_userdata('pesan', "<div class='alert alert-warning alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
				<h4><i class='icon fa fa-warning'></i> Peringatan</h4>
				".$isi."
				</div>");
		}
	}