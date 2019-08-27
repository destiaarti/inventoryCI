<section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Services</h1>
                    <p>Layanan kami akan disesuaikan dengan kebutuhan perusahaan anda.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://ezatech.com">Home</a></li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="services">
        <div class="container">
        <div class="row">
            <!--
            <div class="container">
                <h2>About Us</h2>
            </div>
            <div class="gap"></div>
            -->
            <div class="col-sm-6">
                <div>
                <!--  isi gambar disini. -->
                <img class="img-responsive img-blog" src="assets/template/front/images/ezatech_service.jpg" width="100%" alt="" />
                </div>
            </div><!--/.col-sm-6-->

            <div class="col-sm-6" align="justify">
                <br>
                <br>

                <p><b>EZATECH</b> sebagai jasa pembuatan software, website dan design selalu berusaha memberikan penawaran yang realistis, dan disesuaikan dengan anggaran dari pihak klien, bergantung pada beberapa faktor, seperti : tingkat kesulitan, lama pembuatan, tingkat kebutuhan, keamanan, dll, namun tetap dengan memberikan kualitas sistem dan desain yang terbaik bagi klien.</p>
<p>Berikut beberapa layanan kami :</p>
            </div><!--/.col-sm-6-->
        </div><!--/.row-->
        <div class="gap"></div>
        <hr>
        
        <div class="container">
            <div class="row">
                <?php foreach($layanan as $layanan) { ?>
                <div class="col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-md"><img src="<?php echo base_url('assets/image/'.$layanan->gambar) ?>" style="height:70px"/></i>
                        </div>
                        <div class="media-body" align="justify">
                            <h3 class="media-heading"><?php echo $layanan->judul_layanan ?></h3>
                            <p><?php echo $layanan->isi_layanan ?></p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <?php } ?>
            </div><!--/.row-->
        </div><!--/.container-->
        
        <!--
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center">
                        <h2>What our clients say</h2>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                    <div class="gap"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                        <div class="col-md-6">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                        <div class="col-md-6">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                    </div>

                </div>
            </div>
        -->
        </div>
    </section><!--/#services-->