<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newcar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('newcar');
		$this->db->order_by('id_newcar','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function konfirmasi_admin() {
		$this->db->select('konfirmasi_bayar.*, users.nama, voucher_lelang.total_bayar, voucher_lelang.tanggal_beli');
		$this->db->from('konfirmasi_bayar');
		// Join dg 2 tabel
		// $this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','konfirmasi_bayar.id_user = users.id_user','LEFT');
		$this->db->join('voucher_lelang','konfirmasi_bayar.id_voucher = voucher_lelang.id','LEFT');
		// End join
		// $this->db->where('jenis_galeri <>','Pop up');
		$this->db->order_by('konfirmasi_bayar.id','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function lelang_sekarang() {
		$tanggal = date("Y-m-d");
		$waktu = date("H:i");

		$this->db->select('lelang.*, merk_mobil.nama_merk, kilometer.nama_kilometer');
		$this->db->from('lelang');
		// Join dg 2 tabel
		// $this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('merk_mobil','lelang.merk = merk_mobil.id_merk','LEFT');
		$this->db->join('kilometer','lelang.kilometer = kilometer.id_kilometer','LEFT');
		// End join
		$this->db->where('tanggal_lelang',$tanggal);
		$this->db->where('waktu_selesai >',$waktu);
		// $this->db->order_by('lelang.id_lelang','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lelang_terakhir($id_lelang) {
		$this->db->select('*');
		$this->db->from('data_bid');
		$this->db->where('id_lelang',$id_lelang);
		$this->db->order_by('id_bid','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_status($id_user) {
		$this->db->select('status');
		$this->db->from('voucher_lelang');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function data_user($id_user) {
		$this->db->select('*');
		$this->db->from('voucher_lelang');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function data_konfirmasi($id_voucher) {
		$this->db->select('*');
		$this->db->from('konfirmasi_bayar');
		$this->db->where('id_voucher',$id_voucher);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function harga_awal($id_lelang) {
		$this->db->select('harga_awal');
		$this->db->from('lelang');
		$this->db->where('id_lelang',$id_lelang);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function nomor_voucher_terakhir() {
		$this->db->select('nomor');
		$this->db->from('voucher_lelang');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function listing_banner() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		// $this->db->where('jenis_galeri <>','Pop up');
		$this->db->where('jenis_galeri','Homepage');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function data_bid($id_lelang) {
		$this->db->select('*');
		$this->db->from('data_bid');
		$this->db->where('id_lelang',$id_lelang);
		$this->db->order_by('id_bid','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_mobil() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		// $this->db->where('jenis_galeri <>','Pop up');
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function slider() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Homepage');
		$this->db->order_by('urutan','ASC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function galeri_home() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri, , users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		// $this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data popup
	public function popup() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Pop up');
		$this->db->order_by('popup_status','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data popup
	public function popup_aktif() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'jenis_galeri' 	=> 'Pop up',
								'popup_status'	=> 'Publish'));
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing data slider
	public function galeri($limit,$start) {
		$this->db->select('*');
		$this->db->from('newcar');
		// Join dg 2 tabel
		$this->db->order_by('id_newcar','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total_galeri() {
		$this->db->select('*');
		$this->db->from('newcar');
		$this->db->order_by('id_newcar','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kategori
	public function kategori() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori_galeri
	public function kategori_galeri($id_kategori_galeri,$limit,$start) {
		$this->db->select('galeri.*, users.nama, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'galeri.id_kategori_galeri'	=> $id_kategori_galeri,
								'galeri.jenis_galeri'	=> 'Galeri'));
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori_galeri
	public function all_kategori($id_kategori_galeri) {
		$this->db->select('galeri.*, users.nama, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'galeri.id_kategori_galeri'	=> $id_kategori_galeri,
								'galeri.jenis_galeri'	=> 'Galeri'));
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_newcar) {
		$this->db->select('*');
		$this->db->from('newcar');
		$this->db->where('id_newcar',$id_newcar);
		$this->db->order_by('id_newcar','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('newcar',$data);
	}

	public function simpan_beli($data) {
		$this->db->insert('voucher_lelang',$data);
	}

	public function simpan_konfirmasi($data) {
		$this->db->insert('konfirmasi_bayar',$data);
	}

	public function tambah_bid($data) {
		$this->db->insert('data_bid',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	}

	public function ubah_status_voucher($data) {
		$this->db->where('id',$data['id']);
		$this->db->update('voucher_lelang',$data);
	}

	public function konfirmasi_voucher($id_voucher) {
		$this->db->where('id',$id_voucher);
		$this->db->set('status',1);
		$this->db->update('voucher_lelang');
	}

	public function konfirmasi_bayar($id) {
		$this->db->where('id',$id);
		$this->db->set('status',1);
		$this->db->update('konfirmasi_bayar');
	}

	// Edit
	public function edit2($data2) {
		$this->db->where('jenis_galeri','Pop up');
		$this->db->update('galeri',$data2);
	}

	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_galeri',$hit['id_galeri']);
		$this->db->update('galeri',$hit);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_newcar',$data['id_newcar']);
		$this->db->delete('newcar',$data);
	}
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */