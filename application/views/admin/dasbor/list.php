<!-- Info boxes -->
<?php if($this->session->userdata('akses_level')=="User") { ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>

     <!-- Slick CSS -->
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

     <!-- Our CSS -->
     <style>
        /* body {
             font-family: Verdana, Geneva, Tahoma, sans-serif;
             background: #dedede;
         }*/

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
 </head>
 <body>
     <div class="container" style="margin-left:-20px">
         <div class="slider">
          <?php
          foreach ($promo as $pm) {
            ?>
            <div>
                <a href="#">
                    <img src="<?php echo base_url('assets/upload/image/'.$pm->file) ?>" height="500">
                </a>            
            </div>
            <?php
          }
          ?>
         </div>
     </div>
         

     
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

 </body>
 </html>
<?php
}else{
  ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-newspaper-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Berita</span>
          <span class="info-box-number">
            <?php echo $this->dasbor_model->berita()->total; ?>
            <small>Post</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Staff</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->staff()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">File Unduhan</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->download()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-image"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Galeri</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->galeri()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->


    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-lock"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pengguna</span>
          <span class="info-box-number">
            <?php echo $this->dasbor_model->user()->total; ?>
            <small>User</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-money"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Client</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->client()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Agenda</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->agenda()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-film"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Video</span>
          <span class="info-box-number"><?php echo $this->dasbor_model->video()->total; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-12">
  <hr>
  <h2>Statistik kunjungan terakhir</h2>
  <hr>
  <!-- Styles -->
  <style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }

  </style>

  <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

  <!-- Chart code -->
  <script>
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("chartdiv", am4charts.XYChart);
  chart.paddingRight = 20;

  // Add data
  chart.data = [
  <?php 
  $kunjungan = $this->dasbor_model->kunjungan();
  foreach($kunjungan as $kunjungan) {
  ?>
  {
    "year": "<?php echo date('d-m-Y',strtotime($kunjungan->hari)) ?>",
    "value": <?php echo $kunjungan->total; ?>
  }, 
  <?php } ?>
  ];

  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "year";
  categoryAxis.renderer.minGridDistance = 50;
  categoryAxis.renderer.grid.template.location = 0.5;
  categoryAxis.startLocation = 0.5;
  categoryAxis.endLocation = 0.5;

  // Pre zoom
  chart.events.on("datavalidated", function () {
    categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length * 0.55));
  });

  // Create value axis
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.baseValue = 0;

  // Create series
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = "value";
  series.dataFields.categoryX = "year";
  series.strokeWidth = 2;
  series.tensionX = 0.77;

  var range = valueAxis.createSeriesRange(series);
  range.value = 0;
  range.endValue = 1000;
  range.contents.stroke = am4core.color("#FF0000");
  range.contents.fill = range.contents.stroke;

  // Add scrollbar
  var scrollbarX = new am4charts.XYChartScrollbar();
  scrollbarX.series.push(series);
  chart.scrollbarX = scrollbarX;

  chart.cursor = new am4charts.XYCursor();

  }); // end am4core.ready()
  </script>

  <!-- HTML -->
  <div id="chartdiv"></div>


    </div>
  </div>
  <!-- /.row -->
  <?php
}
?>


