<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>
<!-- <p class="btn-group">
  <a href="<?php echo base_url('admin/galeri/tambah_mobil') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah Mobil</a>&nbsp;

  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button> 

</p> -->


<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
<tr>
    <th>
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
        </div>
    </th>
    <th>Gambar</th>
    <th>Tipe Mobil</th>
    <th>Pemilik</th>
    <th>Transmisi</th>
    <th>Tahun</th>
    <th>Warna</th>
    <th>Harga</th>
    <!-- <th width="15%">Action</th> -->
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_jual[]" value="<?php echo $galeri->id_jual ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
    <td><?php echo $galeri->tipe_mobil ?></td>
    <td><?php echo $galeri->nama_pemilik ?><br><?php echo $galeri->hp_pemilik ?><br><?php echo $galeri->alamat_pemilik ?></td>
    <td><?php echo $galeri->transmisi ?></td>
    <td><?php echo $galeri->tahun ?></td>
    <td><?php echo $galeri->warna ?></td>
    <td><?php echo number_format($galeri->harga) ?></td>
    <!-- <td>
      <div class="btn-group">
      <a href="<?php echo base_url('galeri/read/'.$galeri->id_jual) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_jual) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

       <a href="<?php echo base_url('admin/galeri/delete/'.$galeri->id_jual) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td> -->
</tr>

<?php $i++; } ?>

</tbody>
</table>