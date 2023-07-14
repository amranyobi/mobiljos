<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>
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
    <th>Nama Member</th>
    <th>Tanggal Beli</th>
    <th>Tanggal Bayar /<br>Tanggal Konfirmasi</th>
    <th>Total Bayar</th>
    <th>Bukti Bayar</th>
    <th>Status</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($konfirmasi_admin as $konf) { ?>

<tr class="odd gradeX">
    <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_konfirmasi[]" value="<?php echo $konf->id ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td><?php echo $konf->nama ?></td>
    <td><?php echo date("d-m-Y",strtotime($konf->tanggal_beli)) ?></td>
    <td><?php echo date("d-m-Y",strtotime($konf->tanggal_bayar)) ?> /<br><?php echo date("d-m-Y",strtotime($konf->tanggal_konfirmasi)) ?></td>
    <td><?php echo number_format($konf->total_bayar)?></td>
    <td><a href="<?php echo base_url('assets/upload/image/'.$konf->alamat_file) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> Unduh</a></td>
    <td>
      <?php
      if($konf->status=='0')
      {
        ?>
        <span class="label label-danger">&nbsp;&nbsp;&nbsp;&nbsp;Belum Divalidasi&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <?php
      }elseif($konf->status=='1')
      {
        ?>
        <span class="label label-success">&nbsp;&nbsp;&nbsp;&nbsp;Sudah Divalidasi&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <?php
      }
      ?>
    </td>
    <td>
      <div class="btn-group">
      <a onClick="return confirm('Anda yakin akan mengkonfirmasi pembayaran?'); if (ok) return true; else return false"  href="<?php echo base_url('admin/training/proses_konfirmasi/'.$konf->id.'/'.$konf->id_voucher) ?>" 
      class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>&nbsp;Validasi</a>

       <a href="<?php echo base_url('admin/galeri/delete/'.$konf->id) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>