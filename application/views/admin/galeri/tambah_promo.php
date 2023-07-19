
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
echo form_open_multipart(base_url('admin/galeri/simpan_promo'));
?>
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label>Upload gambar</label>
			<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
		</div>
	</div>

	<div class="col-md-12">

		<!-- <div class="form-group">
			<label>Isi galeri</label>
			<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi galeri"><?php echo set_value('isi') ?></textarea>
		</div>

		<div class="form-group">
			<label>Link / website yang terkait dengan Galeri</label>
			<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website') ?>">
		</div> -->

		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success" value="Simpan Data">
			<a href="<?php echo base_url('admin/galeri/promo') ?>" class="btn btn-danger">Batal</a>
		</div>

	</div>
</div>
<?php
// Form close
echo form_close();
?>