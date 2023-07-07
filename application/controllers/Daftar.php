<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('daftar_model');
	}

	// Main page kontak
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Daftar Member '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Daftar Member '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Daftar Member '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'daftar/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah() {
		// Nambah agenda, check validasi
		$data = array(
						'nama'			=> $this->input->post('nama'),
						'alamat' 	=> $this->input->post('alamat'),
						'handphone'		=> $this->input->post('handphone'),
						'email'		=> $this->input->post('email'),									
						'username'			=> $this->input->post('username'),
						'akses_level'			=> 'User',
						'password'		=> sha1($this->input->post('password'))
				);
		$simpan = $this->daftar_model->tambah($data);
		if($simpan)
		{
			$this->session->set_flashdata('sukses','Pendaftaran Member berhasil! Silahkan Login menggunakan akun Anda');
			redirect(base_url().'login');
		}else{
			// echo "test";
			$this->session->set_flashdata('gagal','Pendaftaran Member gagal! Hubungi Admin');
			redirect(base_url().'daftar');
		}

		
		
	}
	

}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */