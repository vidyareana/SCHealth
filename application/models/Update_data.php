<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Update_data extends CI_Model{
		function dokter($id, $nama, $jenis_kelamin, $alamat, $username, $password){
			$password = md5($password);
			$data = array("nama_dokter" => $nama, "jenis_kelamin" => $jenis_kelamin, "alamat" => $alamat, "username" => $username, "password" => $password);
			$this->db->where("id_dokter", $id);
			$this->db->update("dokter", $data);
		}

		function siswa($nis, $nama, $kelas, $jenis_kelamin, $alamat){
			$data = array("nama_siswa" => $nama, "kelas" => $kelas, "jenis_kelamin" => $jenis_kelamin, "alamat" => $alamat);
			$this->db->where("nis", $nis);
			$this->db->update("siswa", $data);
		}

		function obat($id, $nama, $stok){
			$data = array("nama_obat" => $nama, "stok" => $stok);
			$this->db->where("id_obat", $id);
			$this->db->update("obat", $data);
		}
	}