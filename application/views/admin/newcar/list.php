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
  <a href="<?php echo base_url('admin/newcar/tambah') ?>" class="btn btn-sm btn-success">
  <i class="fa fa-plus"></i> Tambah Newcar</a>&nbsp;

  <button class="btn btn-sm btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button> 

</p>


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
    <th>Gambar Poster</th>
    <th>Judul Poster</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($newcar as $sp) { ?>

<tr class="odd gradeX">
    <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_newcar[]" value="<?php echo $sp->id_newcar ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$sp->file) ?>" width="60">
    </td>
    <td><?php echo $sp->judul_newcar ?></td>
    <td>
      <div class="btn-group">
     <!--  <a href="<?php echo base_url('admin/spare/edit/'.$sp->id_spare) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> -->

       <a href="<?php echo base_url('admin/newcar/delete/'.$sp->id_newcar) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>