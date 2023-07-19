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
        No.
    </th>
    <th>Nama / No.HP</th>
    <th>Alamat</th>
    <th>Merk</th>
    <th>Deskripsi</th>
    <!-- <th width="15%">Action</th> -->
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i?></td>
    <td><?php echo $galeri->nama ?><br><?php echo $galeri->handphone ?></td>
    <td><?php echo $galeri->alamat ?></td>
    <td><?php echo $galeri->nama_merk ?></td>
    <td><?php echo $galeri->deskripsi ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>