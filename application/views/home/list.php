
   <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                 <?php $i=1; foreach($slider as $slider) { ?>
                <img src="<?php echo base_url('assets/image/'.$slider->gambar)?>" alt="<?php echo $slider->judul_galeri ?>" data-transition="slideInLeft" />
              <?php $i++;} ?>         
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Contact Us for your <a href="contact-us.php">IT Solution</a>.</strong>
            </div>
        </div>
    
<!--/#main-slider-->

    <section id="services" class="emerald">
        <div class="container">
            <div class="center gap">
                <h2>What we do</h2>
                <p class="lead center">Apa yang dapat kami lakukan dengan layanan IT dan design kami sehingga dapat memajukan usaha / bisnis anda.</p>
            </div> 
            
            <div class="row">
                <?php foreach ($layanan as $layanan) { ?>
                <div class="col-md-4 col-md-4">
                    <div class="media" align="center">
                        <i class="icon-md">
                        <img  src="<?php echo base_url('assets/image/'.$layanan->gambar) ?>" width="80" height="80"/></i>
                        <div class="media-body" >
                            <h3 class="media-heading" ><?php echo $layanan->judul_layanan ?></h3>
                            <p><?php echo character_limiter($layanan->isi_layanan,100) ?></p>
                        </div>
                        <br>
                    </div>
                </div> <!--/.col-md-4-->
                <?php } ?>

            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="recent-works">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h3>Our Latest Project</h3>
                    <p>Beberapa project sedang dan telah kami kerjakan.</p>
                    <div class="btn-group">
                        <a class="btn btn-info" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-info" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-9">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item active">

                              <div class="row">
                                <?php foreach ($galeri as $galeri) { ?>
                                <div class="item">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <img class="img-responsive" src="<?php echo base_url('assets/image/'.$galeri->gambar) ?>" alt="">
                                                <h5>
                                                    <?php echo $galeri->judul_galeri ?>
                                                </h5>
                                                <div class="overlay">
                                                    <a class="preview btn btn-info" title="PUSDIK PENERBAD - SEMARANG" href="<?php echo base_url('assets/image/'.$galeri->gambar) ?>" rel="prettyPhoto"><i class="icon-eye-open"  ></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                   <?php } ?>
                                </div>
                            </div><!--/.item-->
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/#recent-works-->


