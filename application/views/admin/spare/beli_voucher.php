<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<div class="row">
  <div class="col-12">
    <h4>
      <img src="<?php echo base_url('assets/upload/image/LOGO_BARU_M.png') ?>" width="40"> MOBILJOS
      <small class="float-right"></small>
    </h4>
  </div>

</div>

<div class="row invoice-info">
  <!-- <div class="col-sm-4 invoice-col">
    From
    <address>
      <strong>Admin, Inc.</strong><br>
      795 Folsom Ave, Suite 600<br>
      San Francisco, CA 94107<br>
      Phone: (804) 123-5432<br>
      Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="462f28202906272a2b273527232322353233222f296825292b">[email&#160;protected]</a>
    </address>
  </div>

  <div class="col-sm-4 invoice-col">
    To
    <address>
      <strong>John Doe</strong><br>
      795 Folsom Ave, Suite 600<br>
      San Francisco, CA 94107<br>
      Phone: (555) 539-1037<br>
      Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="355f5a5d5b1b515a5075504d54584559501b565a58">[email&#160;protected]</a>
    </address>
  </div> -->

  <div style="margin-bottom: 20px;" class="col-sm-6 invoice-col">
    <b>Invoice : #<?php echo sprintf("%04d", $no_terbaru)?></b><br>
    <!-- <br> -->
    <b>Tanggal:</b> <?php echo date("d-m-Y")?><br>
    <!-- <b>Payment Due:</b> 2/22/2014<br>
    <b>Account:</b> 968-34567 -->
  </div>

</div>

<?php
echo form_open_multipart(base_url('admin/lelang/simpan_beli'));
?>
<div class="row">
  <div class="col-6 table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Rincian</th>
          <th><div align="right">Subtotal (Rp.)</div></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Voucher Lelang</td>
          <td><div align="right"><?php
          $harga_voucher = 5000000;
          echo number_format($harga_voucher)?></div></td>
        </tr>
        <tr>
          <td>Angka Unik</td>
          <td><div align="right"><?php
          $kode_unik = rand ( 100 , 999 );
          echo $kode_unik;
        ?></div></td>
        </tr>
        <tr>
          <td><b>Total</b></td>
          <td><div align="right"><b><?php
          $total_bayar = $harga_voucher + $kode_unik;
          echo number_format($total_bayar);
        ?></b></div></td>
        </tr>
      </tbody>
    </table>
    <input name="harga" value="<?php echo $harga_voucher?>" type="hidden">
    <input name="kode_unik" value="<?php echo $kode_unik?>" type="hidden">
    <input name="total_bayar" value="<?php echo $total_bayar?>" type="hidden">
    <button type="submit" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Beli Voucher</button>
  </div>
</div>
</form>

<script type="text/javascript">
  function show_alert() {
    if(!confirm("Do you really want to do this?")) {
      return false;
    }
    this.form.submit();
  }
</script>