<head>
  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

  <!-- Our CSS -->
  <style>

      .container {
          max-width: 900px;
          padding: 15px;
          background-color: #fff;
          margin-left: auto;
          margin-right: auto;
      }

      .slider .slick-slide {
          border: solid 1px #000;
      }

      .slider .slick-slide img {
          width: 100%;
      }

      /* make button larger and change their positions */
      .slick-prev, .slick-next {
          width: 50px;
          height: 50px;
          z-index: 1;
      }
      .slick-prev {
          left: 5px;
      }
      .slick-next {
          right: 5px;
      }
      .slick-prev:before, 
      .slick-next:before {
          font-size: 40px;
          text-shadow: 0 0 10px rgba(0,0,0,0.5);
      }
      
      /* move dotted nav position */
      .slick-dots {
          bottom: 15px;
      }
      /* enlarge dots and change their colors */
      .slick-dots li button:before {
          font-size: 12px;
          color: #fff;
          text-shadow: 0 0 10px rgba(0,0,0,0.5);
          opacity: 1;
      }
      .slick-dots li.slick-active button:before {
          color: #dedede;
      }

      /* hide dots and arrow buttons when slider is not hovered */
      .slider:not(:hover) .slick-arrow,
      .slider:not(:hover) .slick-dots {
          opacity: 0;
      }
      /* transition effects for opacity */
      .slick-arrow,
      .slick-dots {
          transition: opacity 0.5s ease-out;
      }

  </style>

  <!-- Bootstrap CSS -->

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  <!-- Poppins fonts-->

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


  <style type="text/css">

      #counter{

          width: 250px;

          background: #ff190b;

          box-shadow: 0px 2px 9px 0px black;

      }

  </style>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <!-- Slick JS -->    
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Our Script -->
  <script>
      $(document).ready(function(){
          $('.slider').slick({
              autoplay: true,
              autoplaySpeed: 2500,
              dots: true
          });
      });
  </script>
</head>
<?php
if(isset($status_voucher))
{
  if($status_voucher['status']=='1')
  {
      if(isset($data_lelang)){
        if($data_lelang['judul_lelang']=='')
        {
          ?>
          <div class="card-body">
            <div class="callout callout-danger">
              <h5>Tidak ada lelang!</h5>
              <p>Mohon maaf, untuk saat ini tidak ada lelang yang sedang berjalan</p>
            </div>
          </div>
          <?php
        }else{
          ?>
          <section class="content">
            <div class="card card-solid">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                              <h1 id="counter" class="text-center m-auto p-3 text-white"></h1>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="alert alert-success alert-dismissible">
                      <h5><i class="fa fa-calendar"></i> Periode Lelang</h5>
                      <h4><?php echo date("d-m-Y");?></h4>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="container">
                        <div class="slider">
                            <div>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$data_lelang['gambar']) ?>" alt="Image 1">
                                </a>            
                            </div>
                            <div>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$data_lelang['gambar2']) ?>" alt="Image 2">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$data_lelang['gambar3']) ?>" alt="Image 3">
                                </a>            
                            </div>
                            <div>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$data_lelang['gambar4']) ?>" alt="Image 4">
                                </a>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Spesifikasi</h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                          <li class="nav-item active">
                            <a href="#" class="nav-link">
                              <i class="fa fa-gears"></i> Model
                              <font size="5"><span class="badge bg-primary float-right"><?php echo $data_lelang['judul_lelang']?></span></font>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-bookmark"></i> Tipe
                              <font size="5"><span class="badge bg-warning float-right"><?php echo $data_lelang['transmisi']?></span></font>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-magic"></i> Warna
                              <font size="5"><span class="badge bg-warning float-right"><?php echo $data_lelang['warna']?></span></font>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-calendar"></i> Tahun
                              <font size="5"><span class="float-right"><?php echo $data_lelang['tahun']?></span></font>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <h4 class="mt-3">Grade</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                        <span class="text-xl"><?php echo $data_lelang['grade']?></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <nav class="w-100">
                      <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi</a>
                      </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?php echo $data_lelang['isi']?></div>
                    </div>
                  </div>
                  <div class="col-6">
                    <h4 class="mt-3">Harga Dasar</h4>
                    <div class="bg-gray py-2 px-3 mt-4">
                      <h2 class="mb-0">
                        Rp. <?php echo number_format ($data_lelang['harga_awal'])?>
                      </h2>
                      <!-- <h4 class="mt-0">
                        <small>Ex Tax: $80.00 </small>
                      </h4> -->
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                  <!-- <div class="col-6">
                    <h4 class="mt-3">Bid Berjalan</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Harga Bid</th>
                          <th>Waktu Bid</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Call of Duty</td>
                          <td>455-981-221</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Need for Speed IV</td>
                          <td>247-925-726</td>
                        </tr>
                      </tbody>
                    </table>
                  </div> -->
                  <div class="col-md-6" id="tampil">

                  </div>
                  <div class="col-6">
                    <form id="form">
                      <button id="tombol_tambah" type="button" class="btn btn-lg btn-primary" data-dismiss="modal" >BID</button>
                    </form>
                    <!-- <a href="" class="btn btn-primary btn-lg btn-flat">BID</a> -->
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php
        }
      }else{
        ?>
        <div class="card-body">
          <div class="callout callout-danger">
            <h5>Tidak ada lelang!</h5>
            <p>Mohon maaf, untuk saat ini tidak ada lelang yang sedang berjalan</p>
          </div>
        </div>
        <?php
      }
  }else{
    ?>
    <div class="card-body">
      <div class="callout callout-danger">
        <h5>Anda tidak memiliki Voucher Lelang Aktif!</h5>
        <p>Mohon maaf, Anda tidak memiliki voucher lelang yang aktif. Beli Voucher Lelang terlebih dahulu atau selesaikan proses pembelian voucher jika Anda masih dalam proses pembelian voucher</p>
      </div>
    </div>
    <?php

  }
}else{
  ?>
  <div class="card-body">
    <div class="callout callout-danger">
      <h5>Anda tidak memiliki Voucher Lelang Aktif!</h5>
      <p>Mohon maaf, Anda tidak memiliki voucher lelang yang aktif. Beli Voucher Lelang terlebih dahulu atau selesaikan proses pembelian voucher jika Anda masih dalam proses pembelian voucher</p>
    </div>
  </div>
  <?php
}


?>
<script>

  <?php 

  $date = date("Y-m-d");
  $time = $data_lelang['waktu_selesai'].":00";

  $data = strtotime($date);

  $getDate = date("F d, Y", $data); 

  ?>

  var countDownDate = new Date("<?php echo "$getDate $time"; ?>").getTime();

        // Update the count down every 1 second

  var x = setInterval(function() {

    var now = new Date().getTime();

            // Find the distance between now an the count down date

    var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="counter"11

    // document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +

    // minutes + "m " + seconds + "s ";

    document.getElementById("counter").innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 

    if (distance < 0) {

      clearInterval(x);

      document.getElementById("counter").innerHTML = "EXPIRED";

    }

  }, 1000);

</script>

<script type="text/javascript">
  $(document).ready(function() {
      $.ajax({
          type: 'GET',
          url: "<?php echo base_url(); ?>admin/dasbor/data_lelang/<?php echo $data_lelang['id_lelang']?>",
          cache: false,
          success: function(data) {
              $("#tampil").html(data);
          }
      });

  });

</script>

<script type="text/javascript">
  $(document).ready(function(){
      $("#tombol_tambah").click(function(){
          var data = $('#form').serialize();
          $.ajax({
              type  : 'POST',
              url   : "<?php echo base_url(); ?>admin/dasbor/tambah_bid/<?php echo $data_lelang['id_lelang']?>",
              data: data,
              cache : false,
              success   : function(data){
                  $('#tampil').load("<?php echo base_url(); ?>admin/dasbor/data_lelang/<?php echo $data_lelang['id_lelang']?>");
              }
          });
      });
  });
</script>