<!-- Start Contact us Section -->
<section class="bg-contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="contact-title">JUAL MOBIL</h3>
                        <!-- <form action="<?php echo base_url('jual/tambah') ?>" method="POST" class="contact-form"> -->
                        <?php
                        echo form_open_multipart(base_url('jual/tambah'));
                        ?>
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input type="text" name="nama_pemilik" class="form-control" value="<?php echo set_value('nama_pemilik') ?>">
                                    </div>

                                </div>
                                <input name="urutan" value="1" type="hidden">
                                <input name="status_text" value="Ya" type="hidden">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Handphone / WA Pemilik</label>
                                        <input type="text" name="hp_pemilik" class="form-control" value="<?php echo set_value('hp_pemilik') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>Alamat Pemilik</label>
                                        <input type="text" name="alamat_pemilik" class="form-control" value="<?php echo set_value('alamat_pemilik') ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label>Tipe Mobil</label>
                                        <input type="text" name="tipe_mobil" class="form-control" value="<?php echo set_value('tipe_mobil') ?>">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload gambar</label>
                                        <input type="file" name="gambar" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <input name="jenis_galeri" value="Galeri" type="hidden">

                            <div class="col-md-4">
                                <input name="id_kategori_galeri" value="4" type="hidden">
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi" class="form-control">
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <select name="merk" class="form-control">
                                        <?php foreach($merk as $merk) { ?>
                                            <option value="<?php echo $merk->id_merk ?>"><?php echo $merk->nama_merk ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kilometer</label>
                                    <select name="kilometer" class="form-control">
                                        <?php foreach($kilometer as $kilometer) { ?>
                                            <option value="<?php echo $kilometer->id_kilometer ?>"><?php echo $kilometer->nama_kilometer ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" class="form-control">

                                        <?php
                                        $sekarang = date("Y");
                                        for($x=$sekarang;$x>=1980;$x--)
                                        {
                                            ?>
                                            <option value="<?php echo $x?>"><?php echo $x?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <select name="warna" class="form-control">
                                        <option value="Merah">Merah</option>
                                        <option value="Hijau">Hijau</option>
                                        <option value="Putih">Putih</option>
                                        <option value="Krem">Krem</option>
                                        <option value="Hitam">Hitam</option>
                                        <option value="Kuning">Kuning</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input name="harga" type="text" class="form-control" placeholder=" Tanpa koma/titik">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="isi" class="form-control" rows="5" style="height:100%;"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <button type="submit" class="btn btn-default">Jual</button>
                    </form>
                </div>
                <!-- .col-md-8 -->
                <div class="col-md-4">
                       <!--  <h3 class="contact-title">KONTAK KAMI</h3>
                        <ul class="contact-address">
                            <li>
                                <i class="flaticon-placeholder"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->alamat; ?></p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-vibrating-phone"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->telepon; ?></p>
                                    <p><?php echo $site->hp; ?></p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-message"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->email; ?></p>
                                    <p><?php echo $site->email_cadangan; ?></p>
                                </div>
                            </li>
                        </ul> -->
                        <!-- .contact-address -->
                        <!-- <ul class="social-icon-rounded contact-social-icon">
                            <li><a href="<?php echo $site->facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->instagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->google_plus; ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        </ul> -->
                    </div>
                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .contact-us -->
        </div>
        <!-- .row -->
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