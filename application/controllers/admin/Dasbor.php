<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('client_model');
		$this->load->model('staff_model');
		$this->load->model('client_model');
		$this->load->model('staff_model');
		$this->load->model('dasbor_model');
		$this->load->model('lelang_model');
		$this->load->model('galeri_model');
	}

	// Halaman dasbor
	public function index()
	{
		if($this->session->userdata('akses_level')=="Admin")
		{
			$client 				= $this->client_model->listing();
			$staff 					= $this->staff_model->listing();

			$data = array(	'title'					=> 'Halaman Dasbor',
							'client'				=> $client,
							'staff'					=> $staff,
							'isi'					=> 'admin/dasbor/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$this->load->library('pagination');
			$config['base_url'] 		= base_url().'admin/dasbor/list/';
			$config['total_rows'] 		= count($this->galeri_model->total_galeri());
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] 		= 5;
			$config['uri_segment'] 		= 3;
			$config['per_page'] 		= 12;
			$config['first_url'] 		= base_url().'admin/dasbor/list/';
			$this->pagination->initialize($config); 
			$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
			$galeri 	= $this->galeri_model->galeri($config['per_page'], $page);
			$site 		= $this->konfigurasi_model->listing();
			$kategori 	= $this->galeri_model->kategori();
			$promo 	= $this->galeri_model->listing_promo();
			$data = array(	'title'					=> 'Halaman Dasbor',
							'galeri'				=> $galeri,
							'promo'				=> $promo,
							'isi'					=> 'admin/dasbor/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			
		}
		
	}

	public function lelang_berjalan()
	{
		$client 				= $this->client_model->listing();
		$staff 					= $this->staff_model->listing();
		$lelang_sekarang = $this->lelang_model->lelang_sekarang();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->lelang_model->cek_status($id_user);
		// var_dump($lelang_sekarang);

		$data = array(	'title'					=> 'Lelang Berjalan',
						'client'				=> $client,
						'staff'					=> $staff,
						'data_lelang'			=> $lelang_sekarang,
						'status_voucher'		=> $status_voucher,
						'isi'					=> 'admin/dasbor/lelang_berjalan'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function data_lelang($id_lelang)
	{
		$client 				= $this->client_model->listing();
		$staff 					= $this->staff_model->listing();
		$lelang_sekarang = $this->lelang_model->data_bid($id_lelang);

		// var_dump($lelang_sekarang);

		$data = array(
						// 'title'					=> 'Lelang Berjalan',
						// 'client'				=> $client,
						// 'staff'					=> $staff,
						'data_lelang'			=> $lelang_sekarang
						// 'isi'					=> 'admin/dasbor/lelang_berjalan'
					);
		$this->load->view('admin/dasbor/data_lelang', $data, FALSE);
	}

	public function tambah_bid($id_lelang)
	{
		$lelang_terakhir		= $this->lelang_model->lelang_terakhir($id_lelang);
		$harga_awal		= $this->lelang_model->harga_awal($id_lelang);

		if($lelang_terakhir['nilai']=='')
			$nilai_baru = $harga_awal['harga_awal'] + 500000;
		else
			$nilai_baru = $lelang_terakhir['nilai'] + 500000;
		$id_user = $this->session->userdata('id_user');
		$date = date("Y-m-d H:i:s");
		$data = array(	
						'id_user'		=> $id_user,
						'id_lelang'		=> $id_lelang,
						'waktu'		=> $date,
						'nilai'	=> $nilai_baru
					);
		$this->lelang_model->tambah_bid($data);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */