<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri <>','Pop up');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
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

	public function listing_promo() {
		$this->db->select('*');
		$this->db->from('promo_member');
		$this->db->order_by('id_promo','DESC');
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

	public function listing_mobil_jual() {
		$this->db->select('*');
		$this->db->from('jual');
		$this->db->order_by('id_jual','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_mobil_pesan() {
		$this->db->select('cari.*, merk_mobil.nama_merk');
		$this->db->from('cari');
		$this->db->join('merk_mobil','merk_mobil.id_merk = cari.merk');
		$this->db->order_by('id_cari','DESC');
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
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri, kilometer.nama_kilometer, merk_mobil.nama_merk');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		$this->db->join('merk_mobil','merk_mobil.id_merk = galeri.merk','LEFT');
		$this->db->join('kilometer','kilometer.id_kilometer = galeri.kilometer','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function galeri_sort($jenis,$by) {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri, kilometer.nama_kilometer, merk_mobil.nama_merk');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		$this->db->join('merk_mobil','merk_mobil.id_merk = galeri.merk','LEFT');
		$this->db->join('kilometer','kilometer.id_kilometer = galeri.kilometer','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by($jenis,$by);
		// $this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total_galeri() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
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
	public function detail($id_galeri) {
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_promo($id_promo) {
		$this->db->select('*');
		$this->db->from('promo_member');
		$this->db->where('id_promo',$id_promo);
		$this->db->order_by('id_promo','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('galeri',$data);
	}

	public function tambah_promo($data) {
		$this->db->insert('promo_member',$data);
	}

	public function tambah_cari($data) {
		$this->db->insert('cari',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
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
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}

	public function delete_promo($data) {
		$this->db->where('id_promo',$data['id_promo']);
		$this->db->delete('promo_member',$data);
	}
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */