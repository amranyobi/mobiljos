
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
echo form_open_multipart(base_url('admin/newcar/tambah'));
?>
<div class="row">
	<div class="col-md-8">

		<div class="form-group form-group-lg">
			<label>Judul Poster</label>
			<input type="text" name="judul_newcar" class="form-control" placeholder="Judul Poster" value="<?php echo set_value('judul_newcar') ?>">
		</div>

	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Upload Poster</label>
			<input type="file" name="gambar1" class="form-control" required="required" placeholder="Upload gambar">
		</div>
	</div>

	<div class="col-md-12">

		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success btn-sm" value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-default btn-sm" value="Reset">
		</div>

	</div>
</div>
<?php
// Form close
echo form_close();
?>