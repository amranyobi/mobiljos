<?php 
$site                       = $this->konfigurasi_model->listing(); 
$site_nav                   = $this->konfigurasi_model->listing();
$nav_profil                 = $this->nav_model->nav_profil();
$nav_download               = $this->nav_model->nav_download();
$nav_berita                 = $this->nav_model->nav_berita();
$nav_agenda                 = $this->nav_model->nav_agenda();
$nav_layanan                = $this->nav_model->nav_layanan();

function isMobileDev(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}
?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
<div class="container">
<div class="row">
<div class="main-menu">
<a class="show-res-logo" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 76px; width: auto;" /></a>
<nav class="navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 56px; width: auto;" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- home -->
            <!-- <li><a href="<?php echo base_url() ?>" class="active">BERANDA</a></li> -->
            <li><a href="<?php echo base_url("jual/") ?>" class="active">JUAL MOBIL</a></li>
            <li><a href="<?php echo base_url("galeri/") ?>" class="active">BELI MOBIL</a></li>
            <li><a href="<?php echo base_url("service/") ?>" class="active">SERVICE DAN SPAREPART</a></li>
            <li><a href="<?php echo base_url("newcar/") ?>" class="active">NEW CAR</a></li>
            <?php
            if(isMobileDev()){
                ?>
                <li><a href="<?php echo base_url("daftar/") ?>" class="active">JOIN MEMBER</a></li>
                <li><a href="<?php echo base_url("login/") ?>" class="active">LOGIN</a></li>
                <?php
            }
            ?>
            <!-- berita -->
            <!-- <li><a href="<?php echo base_url('berita') ?>">BERITA</a></li> -->
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BERITA <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_berita as $nav_berita) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/kategori/'.$nav_berita->slug_kategori) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_berita->nama_kategori ?></a></li>
                    <?php } ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Indeks Berita</a></li>                   
                </ul>
            </li> -->

            <!-- LAYANAN -->
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LAYANAN<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_layanan as $nav_layanan) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/layanan/'.$nav_layanan->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_layanan->judul_berita ?></a></li>
                    <?php } ?> 
                </ul>
            </li> -->

            <!-- PROFIL -->
            <!-- <?php foreach($nav_profil as $nav_profil) { ?>
            <li><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>">PROFIL</a></li>
            <?php } ?>  -->
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFIL<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_profil as $nav_profil) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_profil->judul_berita ?></a></li>
                    <?php } ?> 
                </ul>
            </li> -->

            <!-- galeri -->
           <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BELI MOBIL <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    
                    <li class="sub-active"><a href="<?php echo base_url('galeri'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Mobil</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('video'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Video</a></li>                   
                </ul>
            </li> -->
            

            <!-- DOWNLOAD -->
            <!-- <li><a href="<?php echo base_url('galeri') ?>">BELI MOBIL</a></li>
            <li><a href="<?php echo base_url('download') ?>">UNDUHAN</a></li>
            <li><a href="<?php echo base_url('member') ?>">MEMBER</a></li> -->
            <!-- kontak  -->
            <!-- <li><a href="<?php echo base_url('kontak') ?>">KONTAK</a></li> -->
        </ul>
        <!-- <div class="menu-right-option pull-right">
            

            <div class="search-box">
                <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i>
                <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i>
            </div>
            <div class="search-box-text">
                <form action="http://demos.codexcoder.com/labartisan/html/GreenForest/search">
                    <input type="text" name="search" id="all-search" placeholder="Search Here">
                </form>
            </div>
        </div> -->
        <!-- .header-search-box -->
    </div>
    <!-- .navbar-collapse -->
</nav>
</div>
<!-- .main-menu -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>

