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
            <div class="container">
                <div class="section-header">
                    <h2><?php //echo $title ?> LOKASI SERVICE & SPAREPART</h2>
                </div>
                <div class="row" style="margin-top: -100px">
                    <div class="recent-project photo-gallery">
                        <!-- <div id="filters" class="button-group ">
                            <button class="button is-checked" data-filter="*">show all</button>
                            <?php if(count($kategori)>1) { foreach($kategori as $kategori) { ?>
                            <button class="button" data-filter=".<?php echo $kategori->slug_kategori_galeri ?>"><?php echo $kategori->nama_kategori_galeri ?></button>
                            <?php }} ?>
                        </div> -->
                        <div class="portfolio-items portfolio-items-home3">
                            <?php foreach($galeri as $galeri) { ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div style="height:200px;" class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->file) ?>" alt="recent-project-img-1" class="img img-fluid">
                                        <div class="project-plus">
                                            <a href="<?php echo base_url('assets/upload/image/'.$galeri->file) ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="recent-project-content">
                                            <p><a href="#"></a></p>
                                        </div>
                                        <!-- DivTable.com -->
                                        <!-- .latest-port-content -->
                                    </div>
                                    <div style="margin-top: 10px">
                                        <?php echo $galeri->nama_spare; ?>
                                    </div>
                                    <div class="divTable blueTable" style="margin-top: 20px;">
                                    <div class="divTableBody">
                                    <div class="divTableRow">
                                    <div class="divTableCell" style="padding-left: 10px"><b>Alamat</b></div>
                                    <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->alamat; ?></div>
                                    </div>
                                    <div class="divTableRow">
                                            <div class="divTableCell" style="padding-left: 10px"><b>Telp / WA</b></div>
                                            <div class="divTableCell" style="padding-left: 10px"><?php echo $galeri->telp; ?></div>
                                    </div>
                                    <div class="divTableRow">
                                            <div class="divTableCell" style="padding-left: 10px"><b>Rating</b></div>
                                            <div class="divTableCell" style="padding-left: 10px">
                                                <?php
                                                if($galeri->bintang=='1')
                                                {
                                                    ?>
                                                    <img width="100"  src="<?php echo base_url('assets/images/1star.png') ?>">
                                                    <?php
                                                }elseif($galeri->bintang=='2')
                                                {
                                                    ?>
                                                    <img width="100"  src="<?php echo base_url('assets/images/2star.png') ?>">
                                                    <?php
                                                }elseif($galeri->bintang=='3')
                                                {
                                                    ?>
                                                    <img width="100"  src="<?php echo base_url('assets/images/3star.png') ?>">
                                                    <?php
                                                }elseif($galeri->bintang=='4')
                                                {
                                                    ?>
                                                    <img width="100"  src="<?php echo base_url('assets/images/4star.png') ?>">
                                                    <?php
                                                }elseif($galeri->bintang=='5')
                                                {
                                                    ?>
                                                    <img width="100" src="<?php echo base_url('assets/images/5star.png') ?>">
                                                    <?php
                                                }  
                                                ?>
                                            </div>
                                    </div>
                                    <!-- <div class="divTableRow">
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
                                    </div> -->
                                    </div>
                                    </div>
                                    <!-- /.portfolio-img -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <?php } ?>
                            <!-- .items -->
                        </div>

                        <div class="row" style="margin-top:40px">
                            <div class="contact-us">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="contact-title">BOOKING</h3>
                                        <form action="<?php echo base_url('service/tambah_booking') ?>" method="POST" class="contact-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="subjectId" name="nama" autocomplete="off" required="yes">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Nomor Handphone</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="nameId" name="handphone" autocomplete="off" required="yes">
                                                    </div>
                                                    <!-- .form-group -->
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Alamat Lengkap</label>
                                                    <input type="text" class="form-control" id="subjectId" name="alamat" autocomplete="off" required="yes">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Nama Bengkel</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="nameId" name="bengkel" autocomplete="off" required="yes">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Tanggal</label>
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" id="nameId" name="tanggal" autocomplete="off" required="yes">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Jam Booking</label>
                                                    <div class="form-group">
                                                        <select name="jam">
                                                            <?php
                                                            for($x=1;$x<=23;$x++)
                                                            {
                                                                ?>
                                                                <option value="<?php echo sprintf("%02d", $x)?>"><?php echo sprintf("%02d", $x)?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <select name="menit">
                                                            <?php
                                                            for($y=1;$y<=59;$y++)
                                                            {
                                                                ?>
                                                                <option value="<?php echo sprintf("%02d", $y)?>"><?php echo sprintf("%02d", $y)?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
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
                        <!-- .isotope-items -->
                        <div class="load-more-option">
                            <?php if(isset($pagin)) { echo $pagin; }  ?>
                        </div>
                        <!-- .load-more-option -->
                    </div>
                    <!-- .recent-project -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>