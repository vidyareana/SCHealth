<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user')->status!="1"){ redirect('beranda/');}
	}

	public function index()
	{
		redirect('beranda/');
	}

	public function dokter(){
		$data['user'] = $this->session->userdata('user');
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("simpan")!=NULL){
			$this->load->model("Update_data");
			$id = $this->input->post("simpan");
			$nama = $this->input->post("nama");
			$jenis_kelamin = $this->input->post("kel");
			$alamat = $this->input->post("alamat");
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$cek_data = $this->Select_data->cek_data("dokter", array("username" => $username));
			if($cek_data==NULL || $cek_data->id_dokter==$id){
				$this->Update_data->dokter($id, $nama, $jenis_kelamin, $alamat, $username, $password);
				$this->Pesan->sukses("Data dokter telah berhasil diubah");
			} else{
				$this->Pesan->peringatan("Data dokter gagal diubah. Username sudah ada.");
			}
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("hapus")!=NULL){
			$this->load->model("Delete_data");
			$id = $this->input->post("hapus");
			$this->Delete_data->dokter($id);
			$this->Pesan->sukses("Data dokter telah berhasil dihapus");
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("tambah")!=NULL){
			$nama = $this->input->post("nama");
			$jenis_kelamin = $this->input->post("kel");
			$alamat = $this->input->post("alamat");
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$cek_data = $this->Select_data->cek_data("dokter", array("username" => $username));
			if($cek_data==NULL){
				$this->Insert_data->dokter($nama, $jenis_kelamin, $alamat, $username, $password);
				$this->Pesan->sukses("Data dokter telah berhasil ditambahkan");
			} else{
				$this->Pesan->peringatan("Data dokter gagal ditambahkan. Username sudah ada, silahkan masukkan data yang lain.");
			}
		}
		$data["pesan"]=$this->session->userdata("pesan");

		$dokter = $this->Select_data->all_data("dokter");
		$data['dokter'] = $dokter;

		$this->load->view('admin_daftar_dokter_view', $data);
	}

	public function siswa(){
		$data['user'] = $this->session->userdata('user');
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("simpan")!=NULL){
			$this->load->model("Update_data");
			$nis = $this->input->post("simpan");
			$nama = $this->input->post("nama");
			$jenis_kelamin = $this->input->post("kel");
			$alamat = $this->input->post("alamat");
			$kelas = $this->input->post("kelas");
			$this->Update_data->siswa($nis, $nama, $kelas, $jenis_kelamin, $alamat);
			$this->Pesan->sukses("Data siswa telah berhasil diubah");
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("hapus")!=NULL){
			$this->load->model("Delete_data");
			$id = $this->input->post("hapus");
			$this->Delete_data->siswa($id);
			$this->Pesan->sukses("Data siswa telah berhasil dihapus");
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("tambah")!=NULL){
			$nis = $this->input->post("nis");
			$nama = $this->input->post("nama");
			$jenis_kelamin = $this->input->post("kel");
			$alamat = $this->input->post("alamat");
			$kelas = $this->input->post("kelas");
			$cek_data = $this->Select_data->cek_data("siswa", array("nis" => $nis));
			if($cek_data==NULL){
				$this->Insert_data->siswa($nis, $nama, $kelas, $jenis_kelamin, $alamat);
				$this->Pesan->sukses("Data siswa telah berhasil ditambahkan");
			} else{
				$this->Pesan->peringatan("Data siswa gagal ditambahkan. NIS sudah ada, silahkan masukkan data yang lain.");
			}
		}
		$data["pesan"]=$this->session->userdata("pesan");

		$siswa = $this->Select_data->all_data("siswa");
		$data['siswa'] = $siswa;

		$this->load->view('admin_daftar_siswa_view', $data);
	}

	public function obat(){
		$data['user'] = $this->session->userdata('user');
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("simpan")!=NULL){
			$this->load->model("Update_data");
			$id = $this->input->post("simpan");
			$nama = $this->input->post("nama");
			$stok = $this->input->post("stok");
			$cek_data = $this->Select_data->cek_data("obat", array("nama_obat" => $nama));
			if($cek_data==NULL || $cek_data->id_obat==$id){
				$this->Update_data->obat($id, $nama, $stok);
				$this->Pesan->sukses("Data obat telah berhasil diubah");
			} else{
				$this->Pesan->peringatan("Data obat gagal diubah. Nama obat sudah ada.");
			}
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("hapus")!=NULL){
			$this->load->model("Delete_data");
			$id = $this->input->post("hapus");
			$this->Delete_data->obat($id);
			$this->Pesan->sukses("Data obat telah berhasil dihapus");
		}

		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("tambah")!=NULL){
			$nama = $this->input->post("nama");
			$jumlah = $this->input->post("jumlah");
			$cek_data = $this->Select_data->cek_data("obat", array("nama_obat" => $nama));
			if($cek_data==NULL){
				$this->Insert_data->obat($nama, $jumlah);	
				$this->Pesan->sukses("Data obat telah berhasil ditambahkan");
			} else{
				$this->Pesan->peringatan("Data obat gagal ditambahkan. Nama obat sudah ada, silahkan masukkan data lain.");
			}
		}
		$data["pesan"]=$this->session->userdata("pesan");

		$obat = $this->Select_data->all_data("obat");
		$data['obat'] = $obat;

		$this->load->view('admin_daftar_obat_view', $data);
	}

	public function riwayat(){
		$data['user'] = $this->session->userdata('user');
		$data["pesan"]=$this->session->userdata("pesan");
		$data['riwayat'] = $this->Select_data->periksa(array());
		foreach ($data["riwayat"] as $row) {
			$data['diberi'][$row->nis][$row->tgl_periksa] = $this->Select_data->diberi($row->tgl_periksa, $row->nis);
		}

		$this->load->view('admin_daftar_riwayat_view', $data);
	}
}
