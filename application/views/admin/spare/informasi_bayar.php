<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>
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
    <b>Invoice : #<?php echo sprintf("%04d", $status_voucher['nomor'])?></b><br>
    <!-- <br> -->
    <b>Tanggal:</b> <?php echo date("d-m-Y",strtotime($status_voucher['tanggal_beli']))?><br>
    <!-- <b>Payment Due:</b> 2/22/2014<br>
    <b>Account:</b> 968-34567 -->
  </div>

</div>


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
          $harga_voucher = $status_voucher['harga'];
          echo number_format($harga_voucher)?></div></td>
        </tr>
        <tr>
          <td>Angka Unik</td>
          <td><div align="right"><?php
          $angka_unik = $status_voucher['kode_unik'];
          echo $angka_unik;
        ?></div></td>
        </tr>
        <tr>
          <td><b>Total</b></td>
          <td><div align="right"><b><?php
          $total_bayar = $status_voucher['total_bayar'];
          echo number_format($total_bayar);
        ?></b></div></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-6">
    <p class="lead">Metode Pembayaran : Transfer Bank</p>
    <div class="row">
      <div class="col-6">
        <div class="info-box bg-light">
          <div class="info-box-content">
            <span class="info-box-text text-center text-muted">BANK BRI</span>
            <span class="info-box-number text-center text-muted mb-0">067801000586566</span>
            <span class="info-box-number text-center text-muted mb-0">MOBILJOS SARANA UTAMA</span>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="info-box bg-light">
          <div class="info-box-content">
            <span class="info-box-text text-center text-muted">BANK BCA</span>
            <span class="info-box-number text-center text-muted mb-0">8545837630</span>
            <span class="info-box-number text-center text-muted mb-0">MOBILJOS SARANA UTAMA PT</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row no-print">
  <div class="col-6">
    <b>Langkah Pembayaran :</b>
     <ol type="1">
      <li>Lakukan Pembayaran sesuai dengan Total diatas (hingga 3 digit terakhir) melalui akun bank yang tersedia</li>
      <li>Simpan Bukti Pembayaran berupa foto / screenshoot yang menunjukkan pembayaran telah dilakukan</li>
      <li>Klik Menu Konfirmasi Pembayaran</li>
      <li>Masukkan data pembayaran yaitu tanggal bayar dan upload bukti pembayaran lalu klik "Simpan Konfirmasi"</li>
      <li>Tunggu hingga Admin Mobiljos melakukan pengecekan dan konfirmasi pembayaran</li>
      <li>Lakukan pengecekan secara berkala menu "Voucher Lelang" untuk mengetahui status pembayaran</li>
    </ol> 
    <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
      Payment
    </button>
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fas fa-download"></i> Generate PDF
    </button> -->
  </div>
  <div class="col-6">
    <a href="<?php echo base_url('admin/lelang/konfirmasi_bayar/')?>" rel="noopener" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Konfirmasi Pembayaran</a>&nbsp;&nbsp;<a href="<?php echo base_url('admin/lelang/voucher_lelang')?>" class="btn btn-danger">Batal</a>
    <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
      Payment
    </button>
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fas fa-download"></i> Generate PDF
    </button> -->
  </div>
</div>