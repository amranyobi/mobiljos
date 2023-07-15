<!-- Info boxes -->
<?php if($this->session->userdata('akses_level')=="User") { ?>
  <style type="text/css">
    /*
    *
    * ==========================================
    * FOR DEMO PURPOSE
    * ==========================================
    *
    */

    body {
      background: #f4f4f4;
    }

    .banner {
      background: #a770ef;
      background: -webkit-linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
      background: linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
    }

    div.blueTable {
      border: 1px solid #1C6EA4;
      background-color: #EEEEEE;
      width: 100%;
      text-align: left;
      border-collapse: collapse;
    }
    .divTable.blueTable .divTableCell, .divTable.blueTable .divTableHead {
      border: 1px solid #AAAAAA;
      padding: 3px 2px;
    }
    .divTable.blueTable .divTableBody .divTableCell {
      font-size: 13px;
    }
    .divTable.blueTable .divTableRow:nth-child(even) {
      background: #D0E4F5;
    }
    .divTable.blueTable .divTableHeading {
      background: #1C6EA4;
      background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
      background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
      background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
      border-bottom: 2px solid #444444;
    }
    .divTable.blueTable .divTableHeading .divTableHead {
      font-size: 15px;
      font-weight: bold;
      color: #FFFFFF;
      border-left: 2px solid #D0E4F5;
    }
    .divTable.blueTable .divTableHeading .divTableHead:first-child {
      border-left: none;
    }

    .blueTable .tableFootStyle {
      font-size: 14px;
    }
    .blueTable .tableFootStyle .links {
         text-align: right;
    }
    .blueTable .tableFootStyle .links a{
      display: inline-block;
      background: #1C6EA4;
      color: #FFFFFF;
      padding: 2px 8px;
      border-radius: 5px;
    }
    .blueTable.outerTableFooter {
      border-top: none;
    }
    .blueTable.outerTableFooter .tableFootStyle {
      padding: 3px 5px; 
    }
    /* DivTable.com */
    .divTable{ display: table; }
    .divTableRow { display: table-row; }
    .divTableHeading { display: table-header-group;}
    .divTableCell, .divTableHead { display: table-cell;}
    .divTableHeading { display: table-header-group;}
    .divTableFoot { display: table-footer-group;}
    .divTableBody { display: table-row-group;}
  </style>
  <script type="text/javascript">
    
  </script>
  <div class="container-fluid">
    <div class="px-lg-5">

      <!-- For demo purpose -->
      <!-- <div class="row py-5">
        <div class="col-lg-12 mx-auto">
          <div class="text-white p-5 shadow-sm rounded banner">
            <h1 class="display-4">Galeri Mobil Bekas</h1>
          </div>
        </div>
      </div> -->
      <!-- End -->

      <div class="row">
        <!-- Gallery item -->
        <?php foreach($galeri as $galeri) { ?>
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="bg-white rounded shadow-sm"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" alt="" class="img-fluid card-img-top">
            <div align="center" style="margin-top: 10px">
              <h5> <a href="#" class="text-dark"><?php echo $galeri->judul_galeri; ?></a></h5>
              <div class="divTable blueTable" style="margin-top: 20px;">
              <div class="divTableBody">
              <div class="divTableRow">
              <div class="divTableCell" style="padding-left: 10px"><b>Transmisi</b></div>
              <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->transmisi; ?></div>
              </div>
              <div class="divTableRow">
                      <div class="divTableCell" style="padding-left: 10px"><b>Tahun</b></div>
                      <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->tahun; ?></div>
              </div>
              <div class="divTableRow">
                      <div class="divTableCell" style="padding-left: 10px"><b>Merk</b></div>
                      <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->nama_merk; ?></div>
              </div>
              <div class="divTableRow">
                      <div class="divTableCell" style="padding-left: 10px"><b>Kilometer</b></div>
                      <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->nama_kilometer; ?></div>
              </div>
              <div class="divTableRow">
                      <div class="divTableCell" style="padding-left: 10px"><b>Warna</b></div>
                      <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->warna; ?></div>
              </div>
              <div class="divTableRow">
                      <div class="divTableCell" style="padding-left: 10px"><b>Harga</b></div>
                      <div class="divTableCell" style="padding-left: 10px">Rp. <?php echo number_format($galeri->harga);?></div>
              </div>
              </div>
              </div>
              <!-- <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">JPG</span></p>
                <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
              </div> -->
            </div>
          </div>
        </div>
        <?php
        }
        ?>
        <!-- End -->

       
        <!-- End -->

      </div>
    </div>
  </div>
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


