<!-- Start Contact us Section -->
<section class="bg-contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="contact-title">JUAL MOBIL</h3>
                        <!-- <form action="<?php echo base_url('jual/tambah') ?>" method="POST" class="contact-form"> -->
                       
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    if($tipe=='1')
                                    {
                                        ?>
                                        <div class="form-group form-group-lg">
                                            <div class="alert alert-success" role="alert">
                                              Penjualan Mobil berhasil diinputkan
                                            </div>
                                        </div>
                                        <?php
                                    }elseif($tipe=='2')
                                    {
                                        ?>
                                        <div class="form-group form-group-lg">
                                            <div class="alert alert-danger" role="alert">
                                              Penjualan Mobil gagal diinputkan
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
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