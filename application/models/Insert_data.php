<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Insert_data extends CI_Model{
		function dokter($nama, $jenis_kelamin, $alamat, $username, $password){
			$password = md5($password);
			$data = array("nama_dokter" => $nama, "jenis_kelamin" => $jenis_kelamin, "alamat" => $alamat, "username" => $username, "password" => $password);
			$this->db->insert("dokter", $data);
		}

		function siswa($nis, $nama, $kelas, $jenis_kelamin, $alamat){
			$data = array("nis" => $nis, "nama_siswa" => $nama, "jenis_kelamin" => $jenis_kelamin, "alamat" => $alamat, "kelas" => $kelas);
			$this->db->insert("siswa", $data);
		}

		function obat($nama, $jumlah){
			$data = array("nama_obat" => $nama, "stok" => $jumlah);
			$this->db->insert("obat", $data);
		}

		function periksa($id_dokter, $nis, $keluhan, $diagnosa, $tindak_lanjut, $istirahat){
			date_default_timezone_set("Asia/Jakarta");
			$data = array("id_dokter" => $id_dokter, "nis" => $nis, "keluhan" => $keluhan, "diagnosa" => $diagnosa, "tindak_lanjut" => $tindak_lanjut, "tgl_periksa" => date("Y-m-d"), "istirahat" => $istirahat);
			$this->db->insert("memeriksa", $data);
		}

		function diberi($id_obat, $nis, $jumlah){
			date_default_timezone_set("Asia/Jakarta");
			$data = array("id_obat" => $id_obat, "nis" => $nis, "tgl_periksa" => date("Y-m-d"), "jumlah" => $jumlah);
			$this->db->insert("diberi", $data);
		}
	}