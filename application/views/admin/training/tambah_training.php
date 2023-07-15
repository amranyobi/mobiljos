
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
if(isset($id_training))
	echo form_open_multipart(base_url('admin/training/edit/'.$id_training));
else
	echo form_open_multipart(base_url('admin/training/tambah_training'));
?>
<?php
if(isset($id_training))
{
	?>
	<input name="id_training" type="hidden" value="<?php echo $id_training?>">
	<?php
}
?>
<div class="row">
	<div class="col-md-6">

		<div class="form-group form-group-lg">
			<label>Judul Training</label>
			<input type="text" name="judul_training" class="form-control" placeholder="Judul Training" value="<?php
			if(isset($data_satu))
			{
				echo $data_satu['judul_training'];
			}
			?>">
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label>Dokumen Training</label>
			<input type="file" name="gambar1" class="form-control" placeholder="Upload gambar"
			<?php
			if(isset($data_satu)){
				if($data_satu['file']==''){
					?>
					required="required"
				<?php
				}
			}
			?>>
		</div>
	</div>
	<?php
	if(isset($data_satu))
	{
		?>
		<div class="col-md-3">
			<div class="form-group">
				<font size="2px" color="red">Ket : Browse data file training lagi jika ingin diubah, kosongi jika tidak ingin mengubah file.</font>
			</div>
		</div>
		<?php
	}
	?>
</div>

<div class="row">

	<div class="col-md-12">

		<div class="form-group">
			<label>Keterangan Training</label>
			<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi Training"><?php
			if(isset($data_satu))
			{
				echo $data_satu['isi'];
			}
			?></textarea>
		</div>

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