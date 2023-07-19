
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
echo form_open_multipart(base_url('admin/spare/tambah'));
?>
<div class="row">
	<div class="col-md-8">

		<div class="form-group form-group-lg">
			<label>Nama Bengkel</label>
			<input type="text" name="nama_spare" class="form-control" placeholder="Nama Bengkel" value="<?php echo set_value('nama_spare') ?>">
		</div>

	</div>

	<div class="col-md-4">
		<div class="form-group form-group-lg">
			<label>Telp</label>
			<input type="text" name="telp" class="form-control" placeholder="No. HP / Whatsapp" value="<?php echo set_value('telp') ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-group-lg">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>">
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group form-group-lg">
			<label>Bintang</label>
			<select name="bintang" class="form-control">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label>Upload gambar</label>
			<input type="file" name="gambar1" class="form-control" required="required" placeholder="Upload gambar">
		</div>
	</div>

	<div class="col-md-12">

		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success btn-sm" value="Simpan Data">
			<a href="<?php echo base_url('admin/spare') ?>" class="btn btn-danger btn-sm">Batal</a>
		</div>

	</div>
</div>
<?php
// Form close
echo form_close();
?>