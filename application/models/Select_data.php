<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Select_data extends CI_Model{
		function all_data($tabel){
			$this->db->select("*");
			$this->db->select("nama_$tabel 'nama'");
			$query = $this->db->get("$tabel");	
			return $result = $query->result();
		}

		function cek_data($tabel, $id){
			$query = $this->db->get_where("$tabel", $id);
			return $result = $query->row();
		}

		function periksa($id_dokter){
			$this->db->order_by("memeriksa.tgl_periksa DESC, memeriksa.id_periksa DESC");
			$this->db->join('siswa', 'siswa.nis=memeriksa.nis');
			$query = $this->db->get_where("memeriksa", $id_dokter);
			return $result = $query->result();
		}

		function diberi($tgl_periksa, $nis){
			$this->db->where("diberi.tgl_periksa", $tgl_periksa);
			$this->db->join('obat', 'obat.id_obat=diberi.id_obat');
			$query = $this->db->get_where("diberi", ["nis" => $nis]);
			return $result = $query->result();
		}

		function ijin($id){
			$this->db->join('siswa', 'siswa.nis=memeriksa.nis');
			$query = $this->db->get_where("memeriksa", ["memeriksa.id_periksa" => $id]);
			return $result = $query->row();
		}
	}