<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user')==NULL){ redirect('');}
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("simpan_password")=="true"){
			$this->load->model("Update_data");
			$user = $this->session->userdata('user');
			$password = $this->input->post("password");
			$this->Update_data->dokter($user->id_dokter, $user->nama_dokter, $user->jenis_kelamin, $user->alamat, $user->username, $password);
			$cek_data = $this->Select_data->cek_data("dokter", array("id_dokter" => $user->id_dokter));
			$this->session->set_userdata('user', $cek_data);
		}
	}

	public function index(){
		$data['pesan'] = $this->session->userdata('pesan');
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
			//print_r($cek_data);exit;
				$this->Update_data->dokter($id, $nama, $jenis_kelamin, $alamat, $username, $password);
				$this->Pesan->sukses("Data dokter telah berhasil diubah");
				$user = $this->Select_data->cek_data("dokter", array("id_dokter" => $id));
				$this->session->set_userdata('user', $user);
			} else{
				$this->Pesan->peringatan("Data dokter gagal diubah. Username sudah ada.");
			}
			redirect("beranda/");
		}
		if($_SERVER['REQUEST_METHOD']=="POST" and $this->input->post("tambah")!=NULL){
			$nis = $this->input->post("nis");
			$keluhan = $this->input->post("keluhan");
			$diagnosa = $this->input->post("diagnosa");
			$tindak_lanjut = $this->input->post("tindak_lanjut");
			$istirahat = $this->input->post("istirahat");
			$obat = $this->input->post("obat");
			$jumlah = $this->input->post("jumlah");
			$cek_data = $this->Select_data->cek_data("siswa", array("nis" => $nis));
			if($cek_data!=NULL){
				$this->Insert_data->periksa($data['user']->id_dokter, $nis, $keluhan, $diagnosa, $tindak_lanjut, $istirahat);
				if($obat[0]!=NULL){
					for($i=0;$i<count($obat);$i++){
						$cek_stok = $this->Select_data->cek_data("obat", array("id_obat" => $obat[$i]));
						$stok_baru = $cek_stok->stok - $jumlah[$i];
						if($stok_baru>=0){
							$this->load->model("Update_data");
							$this->Update_data->obat($obat[$i], $cek_stok->nama_obat, $stok_baru);
							$this->Insert_data->diberi($obat[$i], $nis, $jumlah[$i]);
							$this->Pesan->sukses("Data periksa telah berhasil ditambahkan.");
						} else{
							$this->Pesan->peringatan("Data periksa gagal ditambahkan. Jumlah obat melebihi stok yang tersedia.");
						}
					}
				}
			} else{
				$this->Pesan->sukses("Data periksa gagal ditambahkan. NIS tidak terdaftar.");
			}
			redirect('beranda/');
		}
		if($data['user']->status=="1"){
			$this->load->view("beranda_view", $data);
		} else{
			$data['siswa'] = $this->Select_data->all_data("siswa");
			$data['obat'] = $this->Select_data->all_data("obat");

			$this->load->view("beranda_dokter_view", $data);
		}
	}

	public function cetak($id=NULL, $tgl=NULL){
		if($id==NULL || $tgl==NULL){
			redirect('');
		} else{
			$data['user'] = $this->session->userdata('user');
			$data['siswa'] = $this->Select_data->ijin($id);
			$data['dokter'] = $this->Select_data->cek_data("dokter", array("id_dokter" => $data['siswa']->id_dokter));
			$data['hari'] = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh");
			$data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
			$this->load->view("cetak_ijin_view", $data);
		}
	}

	public function logout(){
		$this->session->unset_userdata('user'); /**//* Mengapus session pengguna *//**/
		redirect(''); /**//* Kembali menuju halaman login *//**/
	}
}
