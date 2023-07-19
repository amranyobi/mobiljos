<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/spare/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/spare/tambah') ?>" class="btn btn-sm btn-success">
  <i class="fa fa-plus"></i> Tambah Bengkel</a>&nbsp;
</p>


<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
<tr>
    <th>No.</th>
    <th>Gambar Lokasi</th>
    <th>Nama Bengkel</th>
    <th>Alamat</th>
    <th>Telp</th>
    <th>Bintang</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($spare as $sp) { ?>

<tr class="odd gradeX">
    <td>
      <?php echo $i?>
    </td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$sp->file) ?>" width="60">
    </td>
    <td><?php echo $sp->nama_spare ?></td>
    <td><?php echo $sp->alamat ?></td>
    <td><?php echo $sp->telp ?></td>
    <td><?php echo $sp->bintang ?></td>
    <td>
      <div class="btn-group">
     <!--  <a href="<?php echo base_url('admin/spare/edit/'.$sp->id_spare) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> -->

       <a href="<?php echo base_url('admin/spare/delete/'.$sp->id_spare) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>