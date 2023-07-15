<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/training/tambah_training') ?>" class="btn btn-sm btn-success">
  <i class="fa fa-plus"></i> Tambah Training</a>
</p>
<div class="table-responsive mailbox-messages">
  <table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Link</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php $i=1; foreach($training as $train) { ?>

        <tr class="odd gradeX">
          <td><?php echo $i?></td>
          <td><?php echo $train->judul_training ?></td>
          <td><?php echo $train->isi ?></td>
          <td>
            <a target="_blank" href="<?php echo base_url('assets/upload/image/'.$train->file) ?>" class="btn btn-sm btn-success">Unduh</a>
          </td>
          <td>
            <div class="btn-group">
            <a href="<?php echo base_url('admin/training/edit/'.$train->id_training) ?>" 
            class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

             <a href="<?php echo base_url('admin/training/delete/'.$train->id_training) ?>" 
            class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
          </div>
          </td>
        </td>
      </tr>

      <?php $i++; } ?>

    </tbody>
  </table>
</div>