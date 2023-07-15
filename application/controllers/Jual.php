<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jual extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jual_model');
		$this->load->model('kategori_galeri_model');
	}

	// Main page kontak
	public function index()	{
		$kategori_galeri = $this->kategori_galeri_model->listing();
		$merk = $this->kategori_galeri_model->merk();
		$kilometer = $this->kategori_galeri_model->kilometer();
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'kategori_galeri'	=> $kategori_galeri,
						'merk'	=> $merk,
						'kilometer'	=> $kilometer,
						'isi'		=> 'jual/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah() {
		// Nambah agenda, check validasi
		$fileExt = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
		$image = time().'11.'.$fileExt;
		$config['upload_path']   = './assets/upload/image/';
      	$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      	$config['max_size']      = '12000'; // KB  
      	$config['file_name']   	= $image;
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('gambar')) {
			$this->session->set_flashdata('gagal','Upload gambar gagal, Silahkan ulangi lagi');
			redirect(base_url().'jual');
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$image; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 500; // Pixel
	        $config['height']       	= 500; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
	        $i 		= $this->input;
			$data = array(
	        				'judul_jual'		=> $i->post('judul_jual'),
	        				'isi'				=> $i->post('isi'),
	        				'gambar'			=> $image,
	        				'transmisi'		=> $i->post('transmisi'),
	        				'merk'		=> $i->post('merk'),
	        				'kilometer'		=> $i->post('kilometer'),
	        				'tahun'		=> $i->post('tahun'),
	        				'warna'		=> $i->post('warna'),
	        				'harga'		=> $i->post('harga')
					);
			$simpan = $this->jual_model->tambah($data);
			if($simpan)
			{
				$this->session->set_flashdata('sukses','Menambah Penjualan Mobil Berhasil');
				redirect(base_url().'jual/berhasil/1');
			}else{
				// echo "test";
				$this->session->set_flashdata('gagal','Menambah Penjualan Mobil Gagal');
				redirect(base_url().'jual/berhasil/2');
			}
		}
	}

	public function berhasil($tipe){
		$site 			= $this->konfigurasi_model->listing();
		$data = array(	'title'		=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Jual Mobil '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'tipe'		=> $tipe,
						'isi'		=> 'jual/berhasil');
		$this->load->view('layout/wrapper', $data, FALSE);

	}
	

}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */