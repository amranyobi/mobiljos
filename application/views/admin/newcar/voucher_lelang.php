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
  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
      <div class="card-header text-muted border-bottom-0">
        Status Voucher
      </div>
      <?php
      if($status_voucher=='' || $status_voucher['status']=='0' || $status_voucher['status']=='2' || $status_voucher['status']=='3')
      {
        $state = 0;
      }elseif($status_voucher['status']=='1'){
        $state = 1;
      }

      if($state=='0')
      {
        ?>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-7">
              <h2 class="lead"><b><font color="orange"> Voucher Lelang Anda Belum Aktif</font></b></h2>
              <?php
              if(isset($status_voucher['status']))
              {
                if($status_voucher['status']=='0')
                {
                  ?>
                  <p class="text-muted text-sm">Lakukan pembayaran sesuai dengan instruksi. Klik Informasi Pembayaran untuk informasi lebih lanjut</p>
                  <?php
                }elseif($status_voucher['status']=='3')
                {
                  ?>
                  <p class="text-muted text-sm">Anda sudah melakukan pembayaran dan mengirim konfirmasi pembayaran, Tunggu hingga Admin Mobiljos melakukan pengecekan dan validasi pembayaran</p>
                  <?php
                }else{
                  ?>
                  <p class="text-muted text-sm">Lakukan pembelian voucher lelang untuk dapat mengikuti lelang</p>
                  <?php
                }
              }else{
                ?>
                <p class="text-muted text-sm">Lakukan pembelian voucher lelang untuk dapat mengikuti lelang</p>
                <?php
              }
              ?>
            </div>
            <div class="col-5 text-center">
              <img src="<?php echo base_url('assets/images/inactive_user.png') ?>" width="100">
            </div>
          </div>
        </div>
        <?php
        if(isset($status_voucher['status']))
        {
          if($status_voucher['status']=='' || $status_voucher['status']=='2')
          {
            ?>
            <div class="card-footer">
              <div class="text-right"><font size="4">Rp. 5.000.000</font>&nbsp;&nbsp;
                <a href="<?php echo base_url('admin/lelang/beli_voucher') ?>" class="btn btn-success">
                  <i class="fa fa-money" style="color:white"></i>&nbsp;&nbsp;<font color="white">Beli Voucher</font>
                </a>
              </div>
            </div>
            <?php
          }elseif($status_voucher['status']=='0')
          {
            ?>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?php echo base_url('admin/lelang/informasi_bayar') ?>" class="btn btn-success">
                  <i class="fa fa-money" style="color:white"></i>&nbsp;&nbsp;<font color="white">Informasi Pembayaran</font>
                </a>
              </div>
            </div>
            <?php
          }elseif($status_voucher['status']=='3')
          {
            ?>
            <div class="card-footer"> 
              <div class="text-right"><font size="2"><b>Tanggal Konfirmasi :</b> <?php echo date("d-m-Y",strtotime($data_konfirmasi['tanggal_konfirmasi'])) ?></font>
                <a target="_blank" href="<?php echo base_url('assets/upload/image/'.$data_konfirmasi['alamat_file']) ?>" class="btn btn-success">
                  <i class="fa fa-money" style="color:white"></i>&nbsp;&nbsp;<font color="white">Unduh Bukti Bayar</font>
                </a>
              </div>
            </div>
            <?php
          }
        }else{
          ?>
          <div class="card-footer">
            <div class="text-right"><font size="4">Rp. 5.000.000</font>&nbsp;&nbsp;
              <a href="<?php echo base_url('admin/lelang/beli_voucher') ?>" class="btn btn-success">
                <i class="fa fa-money" style="color:white"></i>&nbsp;&nbsp;<font color="white">Beli Voucher</font>
              </a>
            </div>
          </div>
          <?php
        }
       
      }else{
        ?>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-7">
              <h2 class="lead"><b><font color="green"> Voucher Lelang Anda Aktif</font></b></h2>
              <p class="text-muted text-sm">Saat ini Anda dapat mengikuti lelang. Status voucher akan hilang setelah Anda memperoleh mobil lelang</p>
            </div>
            <div class="col-5 text-center">
              <img src="<?php echo base_url('assets/images/active_user.png') ?>" width="100">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-right">
            <a href="<?php echo base_url('admin/dasbor/lelang_berjalan')?>" class="btn btn-success">
              <i class="fa fa-exchange" style="color:white"></i>&nbsp;&nbsp;<font color="white">Ikut Lelang</font>
            </a>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</div>