<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user')==NULL){ redirect('');}
	}

	public function index(){
		redirect('beranda');
	}

	public function riwayat(){
		$data['pesan'] = $this->session->userdata('pesan');
		$data['user'] = $this->session->userdata('user');
			$data['periksa'] = $this->Select_data->periksa(array("id_dokter" =>$data['user']->id_dokter));
			foreach ($data['periksa'] as $row) {
				$data['diberi'][$row->nis][$row->tgl_periksa] = $this->Select_data->diberi($row->tgl_periksa, $row->nis);
			} 
		$this->load->view("dokter_riwayat_view", $data);
	}
}
