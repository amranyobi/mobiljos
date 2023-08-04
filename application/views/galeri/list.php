<style type="text/css">
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
<section class="bg-recent-project-home3">
    <script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
    </script>
<div class="container">
        <div class="section-header">
            <h2><?php //echo $title ?> GALERI MOBIL</h2>
        </div>
        <div class="row" style="margin-top: -100px">
            <div class="recent-project photo-gallery">
                        <!-- <div id="filters" class="button-group ">
                            <button class="button is-checked" data-filter="*">show all</button>
                            <?php if(count($kategori)>1) { foreach($kategori as $kategori) { ?>
                            <button class="button" data-filter=".<?php echo $kategori->slug_kategori_galeri ?>"><?php echo $kategori->nama_kategori_galeri ?></button>
                            <?php }} ?>
          </div> --><?php
          if(isset($by_next))
            $by_next = $by_next;
          else
            $by_next = 'ASC';
          ?>
                         
                        <form name="form1" id="form1">Sort By :
                          <select name="menu1" onchange="MM_jumpMenu('parent',this,0)">
                            <option value="">--Pilih--</option>
                            <option value="<?php echo base_url('galeri/sort/harga/'.$by_next) ?>">Harga</option>
                            <option value="<?php echo base_url('galeri/sort/tahun/'.$by_next) ?>">Tahun</option>
                          </select>
                          &nbsp;<?php
                            if(isset($jenis))
                                echo $jenis;
                            if(isset($by)){
                                echo " (";
                                echo $by;
                                echo ")";
                            }
                            ?>
                        </form>
          <div class="portfolio-items portfolio-items-home3">
                            <?php foreach($galeri as $galeri) { ?>
                                <div class="item <?php echo $galeri->slug_kategori_galeri ?>" data-category="<?php echo $galeri->nama_kategori_galeri ?>">
                                    <div class="item-inner">
                                        <div style="height:200px;" class="portfolio-img">
                                            <!-- <div class="overlay-project"></div> -->
                                            <!-- .overlay-project -->
                                            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" alt="recent-project-img-1" class="img img-fluid">
                                            <div class="project-plus">
                                                <a href="<?php echo base_url('assets/upload/image/'.$galeri->gambar) ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="recent-project-content">
                                                <p><a href="#"></a></p>
                                            </div>
                                            <!-- DivTable.com -->
                                            <!-- .latest-port-content -->
                                        </div>
                                        <div>
                                            <?php echo $galeri->judul_galeri; ?>
                                        </div>
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
                                        <!-- /.portfolio-img -->
                                    </div>
                                    <!-- .item-inner -->
                                </div>
                            <?php } ?>
                            <!-- .items -->
          </div>
                        <!-- .isotope-items -->
                        <div class="load-more-option">
                            <?php if(isset($pagin)) { echo $pagin; }  ?>
                        </div>
                        <!-- .load-more-option -->
      </div>
                    <!-- .recent-project -->
                </div>
                <!-- .row -->
                <div class="row" style="margin-top:40px">
                    <div class="contact-us">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="contact-title">PESAN MOBIL</h3>
                                <form action="<?php echo base_url('galeri/tambah_cari') ?>" method="POST" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="subjectId" name="nama" autocomplete="off" required="yes">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Alamat Lengkap</label>
                                            <input type="text" class="form-control" id="subjectId" name="alamat" autocomplete="off" required="yes">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nomor Handphone</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nameId" name="handphone" autocomplete="off" required="yes">
                                            </div>
                                            <!-- .form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Merk</label>
                                                <select name="merk" class="form-control">
                                                    <?php foreach($merk as $merk) { ?>
                                                        <option value="<?php echo $merk->id_merk ?>"><?php echo $merk->nama_merk ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="5" style="height:100%;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .row -->
                                    <button type="submit" class="btn btn-default">Pesan Mobil</button>
                                </form>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .contact-us -->
                </div>
            </div>
            <!-- .container -->
        </section>
        <!-- End Contact us Section -->


        <!-- STart Maps Section -->
        <style type="text/css" media="screen">
            iframe {
                width: 100%;
                height: auto;
                min-height: 400px;
            }
        </style>
        <!-- <div id="map"><?php echo $site->google_map; ?></div> -->
        <!-- End Maps Section -->