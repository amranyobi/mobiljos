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
    <th>Bengkel</th>
    <th>Waktu</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($spare as $sp) { ?>

<tr class="odd gradeX">
    <td><?php echo $i?></td>
    <td><?php echo $sp->nama ?><br><?php echo $sp->handphone ?></td>
    <td><?php echo $sp->alamat ?></td>
    <td><?php echo $sp->bengkel ?></td>
    <td><?php echo date("d-m-Y",strtotime($sp->tanggal))?><br><?php echo $sp->jam ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>