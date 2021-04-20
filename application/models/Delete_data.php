<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Delete_data extends CI_Model{
		function dokter($id){
			$this->db->where("id_dokter", $id);
			$this->db->delete("dokter");
		}

		function siswa($nis){
			$this->db->where("nis", $nis);
			$this->db->delete("siswa");
		}

		function obat($id){
			$this->db->where("id_obat", $id);
			$this->db->delete("obat");
		}
	}