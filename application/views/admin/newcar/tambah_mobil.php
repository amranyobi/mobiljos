
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/lelang/tambah'));
?>
<div class="row">
	<div class="col-md-6">

	<div class="form-group form-group-lg">
	<label>Judul Lelang</label>
	<input type="text" name="judul_lelang" class="form-control" placeholder="Judul Lelang" value="<?php echo set_value('judul_galeri') ?>">
	</div>

	</div>
	<input name="urutan" value="1" type="hidden">
	<input name="status_text" value="Ya" type="hidden">
	<div class="col-md-6">
		<div class="form-group">
		<label>Harga Awal</label>
		<input name="harga_awal" type="text" class="form-control" placeholder="Tanpa koma/titik">
		</div>
	</div>
</div>
<div class="row">
<!-- <div class="col-md-4">
	<div class="form-group">
	<label>Jenis/Posisi Galeri</label>
	<select name="jenis_galeri" class="form-control">
		<option value="Galeri">Galeri Biasa</option>
		<option value="Homepage">Homepage - Gambar Slider</option>
	  	<option value="Pop up">Pop up Homepage</option>
	  	<option value="Testimonial">Background Testimonial</option>
	</select>

	</div>
</div> -->

<div class="col-md-2">
	<input name="id_kategori_galeri" value="4" type="hidden">
	<div class="form-group">
		<label>Transmisi</label>
		<select name="transmisi" class="form-control">
			<option value="Automatic">Automatic</option>
			<option value="Manual">Manual</option>
		</select>
	</div>
</div>

<div class="col-md-2">
	<div class="form-group">
		<label>Merk</label>
		<select name="merk" class="form-control">
			<?php foreach($merk as $merk) { ?>
				<option value="<?php echo $merk->id_merk ?>"><?php echo $merk->nama_merk ?></option>
			<?php } ?>

		</select>

	</div>
</div>

<div class="col-md-2">
	<div class="form-group">
		<label>Grade</label>
		<select name="grade" class="form-control">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
		</select>
	</div>
</div>

<div class="col-md-2">
	<div class="form-group">
		<label>Kilometer</label>
		<select name="kilometer" class="form-control">
			<?php foreach($kilometer as $kilometer) { ?>
				<option value="<?php echo $kilometer->id_kilometer ?>"><?php echo $kilometer->nama_kilometer ?></option>
			<?php } ?>

		</select>

	</div>
</div>
<div class="col-md-2">

	<div class="form-group">
		<label>Tahun</label>
		<select name="tahun" class="form-control">

			<?php
			$sekarang = date("Y");
			for($x=$sekarang;$x>=1980;$x--)
			{
				?>
				<option value="<?php echo $x?>"><?php echo $x?></option>
				<?php
			}
			?>

		</select>

	</div>
</div>

<div class="col-md-2">
	<div class="form-group">
		<label>Warna</label>
		<select name="warna" class="form-control">
			<option value="Merah">Merah</option>
			<option value="Hijau">Hijau</option>
			<option value="Putih">Putih</option>
			<option value="Krem">Krem</option>
			<option value="Hitam">Hitam</option>
			<option value="Kuning">Kuning</option>
		</select>

	</div>
</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
		<label>Gambar 1</label>
		<input type="file" name="gambar1" class="form-control" required="required" placeholder="Upload gambar">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
		<label>Gambar 2</label>
		<input type="file" name="gambar2" class="form-control" placeholder="Upload gambar">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
		<label>Gambar 3</label>
		<input type="file" name="gambar3" class="form-control" placeholder="Upload gambar">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
		<label>Gambar 4</label>
		<input type="file" name="gambar4" class="form-control" placeholder="Upload gambar">
		</div>
	</div>
	<!-- <div class="col-md-2">
		<div class="form-group">
		<label>Gambar 5</label>
		<input type="file" name="gambar5" class="form-control" placeholder="Upload gambar">
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
		<label>Gambar 6</label>
		<input type="file" name="gambar6" class="form-control" placeholder="Upload gambar">
		</div>
	</div> -->
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label>Tanggal Lelang</label>
			<input name="tanggal_lelang" type="date" class="form-control">
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>Waktu Selesai Lelang</label>
			<input name="waktu_selesai" type="time" class="form-control">
		</div>
	</div>
</div>

<div class="row">

<div class="col-md-12">

<div class="form-group">
<label>Keterangan Lelang</label>
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi galeri"><?php echo set_value('isi') ?></textarea>
</div>

<!-- <div class="form-group">
<label>Link / website yang terkait dengan Galeri</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website') ?>">
</div> -->

<div class="form-group">
<input type="submit" name="submit" class="btn btn-success" value="Simpan Data">
<!-- <input type="reset" name="reset" class="btn btn-default" value="Reset"> -->
</div>

</div>
</div>
<?php
// Form close
echo form_close();
?>