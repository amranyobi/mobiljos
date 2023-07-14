<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>

<?php
$sekarang = date("Y-m-d");
if($status_voucher['status']=='1' && $status_voucher['tanggal_selesai']>=$sekarang)
{
?>
        <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>

        <?php $i=1; foreach($training as $train) { ?>

        <tr class="odd gradeX">
            <td><?php echo $i?></td>
            <td><?php echo $train->judul_training ?></td>
            <td><?php echo $train->isi ?></td>
            <td>
              <a target="_blank" href="<?php echo base_url('assets/upload/image/thumbs/'.$train->file) ?>" class="btn btn-sm btn-success">Unduh</a>
            </td>
            </td>
        </tr>

        <?php $i++; } ?>

        </tbody>
        </table>
<?php
}else{
  ?>
  <div class="card-body">
    <div class="callout callout-danger">
      <h5>Anda tidak memiliki Voucher Training Aktif!</h5>
      <p>Mohon maaf, Anda tidak memiliki voucher training yang aktif. Beli Voucher training terlebih dahulu atau selesaikan proses pembelian voucher jika Anda masih dalam proses pembelian voucher</p>
    </div>
  </div>
  <?php
}
?>