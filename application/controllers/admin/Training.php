<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('training_model');
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
		$training = $this->training_model->listing_training();
		$data = array(	'title'			=> 'Data Training',
						'training'		=> $training,
						'isi'			=> 'admin/training/list_admin');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function konfirmasi_admin()	{
		// $galeri = $this->galeri_model->listing();
		$konfirmasi_admin = $this->training_model->konfirmasi_admin();
		$data = array(	'title'			=> 'Data Konfirmasi Voucher Training',
						'konfirmasi_admin'		=> $konfirmasi_admin,
						'isi'			=> 'admin/training/konfirmasi_admin');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function proses_konfirmasi($id,$id_voucher)	{
		//ubah status voucher
		$this->training_model->konfirmasi_voucher($id_voucher);
		$this->training_model->konfirmasi_bayar($id);
		redirect(base_url('admin/training/konfirmasi_admin'),'refresh');	
	}

	public function data_training()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->training_model->cek_status($id_user);
		$training = $this->training_model->listing_training();
		$data = array(	'title'			=> 'Data Training',
						'training'		=> $training,
						'status_voucher'=> $status_voucher,
						'isi'			=> 'admin/training/list_training');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function voucher_training()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->training_model->cek_status($id_user);
		$data_user = $this->training_model->data_user($id_user);
		if(isset($data_user['id']))
			$data_konfirmasi = $this->training_model->data_konfirmasi($data_user['id']);
		else
			$data_konfirmasi = '';
		$data = array(	'title'			=> 'Voucher Training',
						'isi'			=> 'admin/training/voucher_training',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher,
						'data_konfirmasi'=> $data_konfirmasi
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function beli_voucher($tipe_voucher)	{
		// $galeri = $this->galeri_model->listing();
		$no = $this->training_model->nomor_voucher_terakhir();
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
		$status_voucher = $this->training_model->cek_status($id_user);
		$data = array(	'title'			=> 'Beli Voucher Training',
						'isi'			=> 'admin/training/beli_voucher',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher,
						'no_terbaru'=> $no_terbaru,
						'tipe_voucher'=> $tipe_voucher,
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function informasi_bayar()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->training_model->data_user($id_user);
		$data = array(	'title'			=> 'Informasi Pembayaran',
						'isi'			=> 'admin/training/informasi_bayar',
						'id_user'		=> $id_user,
						'status_voucher'=> $status_voucher
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	public function konfirmasi_bayar()	{
		// $galeri = $this->galeri_model->listing();
		$id_user = $this->session->userdata('id_user');
		$status_voucher = $this->training_model->data_user($id_user);
		$data = array(	'title'			=> 'Konfirmasi Pembayaran',
						'isi'			=> 'admin/training/konfirmasi_bayar',
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
	public function tambah_training()	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_training','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));
		if($valid->run()) {
			$fileExt = pathinfo($_FILES["gambar1"]["name"], PATHINFO_EXTENSION);
			$image = time().'7.'.$fileExt;
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|PDF';
      		$config['max_size']      = '12000'; // KB  
      		$config['file_name']   		= $image;
			$this->load->library('upload', $config);

      		if(! $this->upload->do_upload('gambar1')) {
				// End validasi
				$data = array(	'title'				=> 'Tambah Training',
								'error'    			=> $this->upload->display_errors(),
								'isi'				=> 'admin/training/tambah_training');
				$this->load->view('admin/layout/wrapper', $data, FALSE);
				// Masuk database
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
		        $i 		= $this->input;
		        $data = array(	'id_user'			=> $this->session->userdata('id_user'),
		        				'judul_training'	=> $i->post('judul_training'),
		        				'isi'				=> $i->post('isi'),
		        				'file'				=> $image
		        				);
		        $this->training_model->tambah($data);
		        $this->session->set_flashdata('sukses', 'Data telah ditambah');
		        redirect(base_url('admin/training'),'refresh');
			}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Training',
						'isi'				=> 'admin/training/tambah_training');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit galeri
	public function edit($id_training)	{
		$valid = $this->form_validation;

		$valid->set_rules('judul_training','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));
		$data_satu = $this->training_model->data_satu($id_training);
		if($valid->run()) {
			if($_FILES['gambar1']['name']=='')
			{
				$i 		= $this->input;
				$data = array(	'id_user'			=> $this->session->userdata('id_user'),
								'judul_training'	=> $i->post('judul_training'),
								'isi'				=> $i->post('isi'),
								'id_training'		=> $i->post('id_training'),
								);
				$this->training_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah Diubah');
				redirect(base_url('admin/training'),'refresh');
			}else{
				$fileExt = pathinfo($_FILES["gambar1"]["name"], PATHINFO_EXTENSION);
				$image = time().'7.'.$fileExt;
				$config['upload_path']   = './assets/upload/image/';
	      		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|PDF';
	      		$config['max_size']      = '12000'; // KB  
	      		$config['file_name']   		= $image;
				$this->load->library('upload', $config);

	      		if(! $this->upload->do_upload('gambar1')) {
					// End validasi
					$data = array(	'title'				=> 'Ubah Data Training',
									'error'    			=> $this->upload->display_errors(),
									'data_satu'			=> $data_satu,
									'id_training'		=> $id_training,
									'isi'				=> 'admin/training/tambah_training');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				}else{
					$upload_data        		= array('uploads' =>$this->upload->data());
			        $i 		= $this->input;
			        $data = array(	'id_user'			=> $this->session->userdata('id_user'),
			        				'judul_training'	=> $i->post('judul_training'),
			        				'isi'				=> $i->post('isi'),
									'id_training'		=> $i->post('id_training'),
			        				'file'				=> $image
			        				);
			        $this->training_model->edit($data);
			        $this->session->set_flashdata('sukses', 'Data telah Diubah');
			        redirect(base_url('admin/training'),'refresh');
				}
			}
		}
		
		$data = array(	'title'				=> 'Ubah Data Training',
						'data_satu'			=> $data_satu,
						'id_training'		=> $id_training,
						'isi'				=> 'admin/training/tambah_training');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	public function simpan_beli(){
		$i 		= $this->input;
		$tanggal = date("Y-m-d");
		$no = $this->training_model->nomor_voucher_terakhir();
		if(isset($no))
		{
			if($no['nomor']=='')
				$no_awal = 0;
			else
				$no_awal = $no['nomor'];	
		}else{
			$no_awal = 0;
		}

		//tentukan tanggal voucher
		if($i->post('tipe_voucher')=='1')
			$tanggal_selesai=date('Y-m-d', strtotime('+6 months', strtotime($tanggal)));
		elseif($i->post('tipe_voucher')=='2')
			$tanggal_selesai=date('Y-m-d', strtotime('+1 year', strtotime($tanggal)));
		
		$no_terbaru = $no_awal + 1;
		$data = array('id_user'=> $this->session->userdata('id_user'),
			'tanggal_beli'		=> $tanggal,
			'harga'				=> $i->post('harga'),
			'kode_unik'			=> $i->post('kode_unik'),
			'total_bayar'		=> $i->post('total_bayar'),
			'tanggal_mulai'		=> $tanggal,
			'tanggal_selesai'	=> $tanggal_selesai,
			'tipe_voucher'		=> $i->post('tipe_voucher'),
			'status'			=> 0,
			'nomor'			=> $no_terbaru,
		);
		$this->training_model->simpan_beli($data);
		$this->session->set_flashdata('sukses', 'Anda berhasil memesan voucher');
		redirect(base_url('admin/training/voucher_training'),'refresh');	
	}

	public function simpan_konfirmasi(){
		$fileExt2 = pathinfo($_FILES["bukti_bayar"]["name"], PATHINFO_EXTENSION);
		$image2 = time().'C.'.$fileExt2;
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
		$this->training_model->simpan_konfirmasi($data);

		//ubah status voucher
		$data2 = array(	'id'			=> $i->post('id_voucher'),
						'status'		=> 3
						);
		$this->training_model->ubah_status_voucher($data2);

		$this->session->set_flashdata('sukses', 'Anda berhasil konfirmasi pembayaran! Tunggu pengecekan oleh Admin');
		redirect(base_url('admin/training/voucher_training'),'refresh');	
	}

	// Delete
	public function delete($id_galeri) {
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);

		$galeri = $this->galeri_model->detail($id_galeri);
		// Proses hapus gambar
		if($galeri->gambar=="") {
		}else{
			unlink('./assets/upload/image/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
		}
		// End hapus gambar
		$data = array('id_galeri'	=> $id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/galeri'),'refresh');
	}
}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */