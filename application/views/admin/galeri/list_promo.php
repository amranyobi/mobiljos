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
  <a href="<?php echo base_url('admin/galeri/tambah_promo') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah Promo</a>&nbsp;

</p>


<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
<tr>
    <th>No.</th>
    <th>Gambar</th>
<!--     <th>Judul</th>
    <th>Kategori - Posisi</th>
    <th>Website</th>
    <th>Author</th> -->
    <th>Tanggal</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i?></td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->file) ?>" width="60">
    </td>
<!--     <td><?php echo $galeri->judul_galeri ?>
      
      <br><small>
        Urutan: <?php echo $galeri->urutan ?>
      <br>
      Status Tampil Teks: <?php echo $galeri->status_text ?><br>
      <textarea name="aa"><?php echo base_url('assets/upload/image/'.$galeri->gambar) ?></textarea>
      </small>

    </td>
    <td><?php echo $galeri->nama_kategori_galeri ?> - <?php echo $galeri->jenis_galeri ?></td>
    <td><?php echo $galeri->website ?></td>
    <td><?php echo $galeri->nama ?></td> -->
    <td><?php echo date("d-m-Y",strtotime($galeri->tanggal))?></td>
    <td>
      <div class="btn-group">
<!--       <a href="<?php echo base_url('galeri/read/'.$galeri->id_promo) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_promo) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
 -->
       <a href="<?php echo base_url('admin/galeri/delete_promo/'.$galeri->id_promo) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>