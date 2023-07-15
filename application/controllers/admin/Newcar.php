<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newcar extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('newcar_model');
		$this->load->model('galeri_model');
		$this->load->model('kategori_galeri_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman galeri
	public function index()	{
		// $galeri = $this->galeri_model->listing();
		$newcar = $this->newcar_model->listing();
		$data = array(	'title'			=> 'Data Newcar',
						'newcar'		=> $newcar,
						'isi'			=> 'admin/newcar/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function konfirmasi_admin()	{
		// $galeri = $this->galeri_model->listing();
		$konfirmasi_admin = $this->lelang_model->konfirmasi_admin();
		$data = array(	'title'			=> 'Data Konfirmasi Voucher',
						'konfirmasi_admin'		=> $konfirmasi_admin,
						'isi'			=> 'admin/lelang/konfirmasi_admin');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function proses_konfirmasi($id,$id_voucher)	{
		//ubah status voucher
		$this->lelang_model->konfirmasi_voucher($id_voucher);
		$this->lelang_model->konfirmasi_bayar($id);
		redirect(base_url('admin/lelang/konfirmasi_admin'),'refresh');	
	}

	public function mobil()	{
		// $galeri = $this->galeri_model->listing();
		$galeri = $this->galeri_model->listing_mobil();
		$data = array(	'title'			=> 'Data Mobil Bekas',
						'galeri'		=> $galeri,
						'isi'			=> 'admin/galeri/list_mobil');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function voucher_lelang()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->lelang_model->cek_status($id_user);
		$data_user = $this->lelang_model->data_user($id_user);
		if(isset($data_user['id']))
			$data_konfirmasi = $this->lelang_model->data_konfirmasi($data_user['id']);
		else
			$data_konfirmasi = '';
		$data = array(	'title'			=> 'Voucher Lelang',
						'isi'			=> 'admin/lelang/voucher_lelang',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher,
						'data_konfirmasi'=> $data_konfirmasi
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function beli_voucher()	{
		// $galeri = $this->galeri_model->listing();
		$no = $this->lelang_model->nomor_voucher_terakhir();
		if(isset($no))
		{
			if($no['nomor']=='')
				$no_awal = 0;
			else
				$no_awal = $no['nomor'];	
		}else{
			$no_awal = 0;
		}
		
		$no_terbaru = $no_awal + 1;
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->lelang_model->cek_status($id_user);
		$data = array(	'title'			=> 'Beli Voucher Lelang',
						'isi'			=> 'admin/lelang/beli_voucher',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher,
						'no_terbaru'=> $no_terbaru
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function informasi_bayar()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->lelang_model->data_user($id_user);
		$data = array(	'title'			=> 'Informasi Pembayaran',
						'isi'			=> 'admin/lelang/informasi_bayar',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function konfirmasi_bayar()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->lelang_model->data_user($id_user);
		$data = array(	'title'			=> 'Konfirmasi Pembayaran',
						'isi'			=> 'admin/lelang/konfirmasi_bayar',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_galerinya		= $inp->post('id_galeri');

   			for($i=0; $i < sizeof($id_galerinya);$i++) {
   				$galeri 	= $this->galeri_model->detail($id_galerinya[$i]);
   				if($galeri->gambar !='') {
					unlink('./assets/upload/galeri/'.$galeri->gambar);
					unlink('./assets/upload/galeri/thumbs/'.$galeri->gambar);
				}
				$data = array(	'id_galeri'	=> $id_galerinya[$i]);
   				$this->galeri_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/galeri'),'refresh');
   		// PROSES SETTING DRAFT
   		}
	}

	// Tambah galeri
	public function tambah()	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_newcar','Judul','required',
			array(	'required'	=> 'Nama Poster Newcar harus diisi'));
		if($valid->run()) {
			$fileExt = pathinfo($_FILES["gambar1"]["name"], PATHINFO_EXTENSION);
			$image = time().'9.'.$fileExt;
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
      		$config['file_name']   		= $image;
			$this->load->library('upload', $config);

      		if(! $this->upload->do_upload('gambar1')) {
				// End validasi
				$data = array(	'title'				=> 'Tambah Poster Newcar',
								'error'    			=> $this->upload->display_errors(),
								'isi'				=> 'admin/newcar/tambah');
				$this->load->view('admin/layout/wrapper', $data, FALSE);
				// Masuk database
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
		        $data = array(	'id_user'			=> $this->session->userdata('id_user'),
		        				'judul_newcar'		=> $i->post('judul_newcar'),
		        				'file'				=> $image,
		        				);
		        $this->newcar_model->tambah($data);
		        $this->session->set_flashdata('sukses', 'Data telah ditambah');
		        redirect(base_url('admin/newcar'),'refresh');
			}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Poster Newcar',
						'isi'				=> 'admin/newcar/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit galeri
	public function edit($id_galeri)	{
		$kategori_galeri 	= $this->kategori_galeri_model->listing();
		$galeri 	= $this->galeri_model->detail($id_galeri); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi galeri harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'galeri'			=> $galeri,
						'error'    			=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        // Proses hapus gambar
			if($galeri->gambar != "") {
				unlink('./assets/upload/image/'.$galeri->gambar);
				unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
			}
			// End hapus gambar

	        $i 		= $this->input;

	        $data = array(	'id_galeri'			=> $id_galeri,
	        				'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_galeri'		=> $i->post('judul_galeri'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_galeri'		=> $i->post('jenis_galeri'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website'),
	        				'status_text'		=> $i->post('status_text'),
	        				'urutan'		=> $i->post('urutan')
	        				);
	        $this->galeri_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/galeri'),'refresh');
		}}else{
			$i 		= $this->input;

	        $data = array(	'id_galeri'			=> $id_galeri,
	        				'id_kategori_galeri'=> $i->post('id_kategori_galeri'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'judul_galeri'		=> $i->post('judul_galeri'),
	        				'isi'				=> $i->post('isi'),
	        				'jenis_galeri'		=> $i->post('jenis_galeri'),
	        				'website'			=> $i->post('website'),
	        				'status_text'		=> $i->post('status_text'),
	        				'urutan'		=> $i->post('urutan')
	        				);
	        $this->galeri_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/galeri'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Galeri',
						'kategori_galeri'	=> $kategori_galeri,
						'galeri'			=> $galeri,
						'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	public function simpan_beli(){
		$i 		= $this->input;
		$tanggal = date("Y-m-d");
		$no = $this->lelang_model->nomor_voucher_terakhir();
		if(isset($no))
		{
			if($no['nomor']=='')
				$no_awal = 0;
			else
				$no_awal = $no['nomor'];	
		}else{
			$no_awal = 0;
		}
		
		$no_terbaru = $no_awal + 1;
		$data = array('id_user'=> $this->session->userdata('id_user'),
			'tanggal_beli'		=> $tanggal,
			'harga'				=> $i->post('harga'),
			'kode_unik'			=> $i->post('kode_unik'),
			'total_bayar'		=> $i->post('total_bayar'),
			'status'			=> 0,
			'nomor'			=> $no_terbaru,
		);
		$this->lelang_model->simpan_beli($data);
		$this->session->set_flashdata('sukses', 'Anda berhasil memesan voucher');
		redirect(base_url('admin/lelang/voucher_lelang'),'refresh');	
	}

	public function simpan_konfirmasi(){
		$fileExt2 = pathinfo($_FILES["bukti_bayar"]["name"], PATHINFO_EXTENSION);
		$image2 = time().'B.'.$fileExt2;
		$config2['upload_path']   = './assets/upload/image/';
		$config2['allowed_types'] = 'jpg|png|svg|jpeg|pdf';
		$config2['max_size']      = '12000'; // KB  
		$config2['file_name']   		= $image2;
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		$this->upload->do_upload('bukti_bayar');
		$upload_data2        		= array('uploads2' =>$this->upload->data());
		$i 		= $this->input;
		$tanggal = date("Y-m-d");
		$data = array('id_user'=> $this->session->userdata('id_user'),
			'id_voucher'		=> $i->post('id_voucher'),
			'alamat_file'		=> $image2,
			'tanggal_bayar'		=> $i->post('tanggal_bayar'),
			'tanggal_konfirmasi'=> $tanggal,
			'status'			=> 0
		);
		$this->lelang_model->simpan_konfirmasi($data);

		//ubah status voucher
		$data2 = array(	'id'			=> $i->post('id_voucher'),
						'status'		=> 3
						);
		$this->lelang_model->ubah_status_voucher($data2);

		$this->session->set_flashdata('sukses', 'Anda berhasil konfirmasi pembayaran! Tunggu pengecekan oleh Admin');
		redirect(base_url('admin/lelang/voucher_lelang'),'refresh');	
	}

	// Delete
	public function delete($id_newcar) {
		// Tambahkan proteksi halaman
		$newcar = $this->newcar_model->detail($id_newcar);
		// Proses hapus gambar
		if($newcar->file=="") {
		}else{
			unlink('./assets/upload/image/'.$newcar->file);
			unlink('./assets/upload/image/thumbs/'.$newcar->file);
		}
		// End hapus gambar
		$data = array('id_newcar'	=> $id_newcar);
		$this->newcar_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/newcar'),'refresh');
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */