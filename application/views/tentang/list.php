 <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>About Us</h1>
                    <p>Tim kami yang siap mensuport kebutuhan solusi IT anda.</p>
                </div>
                
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://ezatech.com">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="about-us" class="container">
        <div class="row">
            <!--
            <div class="container">
                <h2>About Us</h2>
            </div>
            <div class="gap"></div>
            -->
            <div class="col-sm-6">
                <div>
                <!--  isi gambar disini.
                <img class="img-responsive img-blog" src="assets/template/front/images/ezatech_about.jpg" width="100%" alt="" /> -->
                <iframe width="560" height="315" src="<?php echo $konfigurasi->youtube ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div><!--/.col-sm-6-->

            <div class="col-sm-6">
                <p><?php echo $konfigurasi->deskripsi ?></p>
            </div><!--/.col-sm-6-->
        </div><!--/.row-->
    </section><!--/#about-us-->
    
    <section id="the-team" class="clouds">   
        <div class="container">
        <h1 class="center">Meet the Team</h1>
        <p class="lead center">Dengan bangga memperkenalkan tim khusus yang  mendukung klien kami, dan bekerja keras untuk hasil terbaik di setiap produk.</p>
        <div class="gap"></div>




        <div id="meet-the-team" class="row">
             <?php $i=1; foreach($team as $team) { ?>
            <div class="col-md-4 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-rounded" src="<?php echo base_url('assets/image/'.$team->gambar)?>" alt="" ></p>
                    <h5><?php echo $team->nama ?><small class="designation muted"><?php echo $team->job ?></small></h5>
                    <a class="btn btn-social btn-facebook" href="<?php echo $team->facebook?>" target="_blank"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="https://plus.google.com/+AzzaMujibuzZamzami-EZATECH" target="_blank"><i class="icon-google-plus" target="_blank"></i></a> <a class="btn btn-social btn-twitter" href="http://twitter.com/Azza_Anu" target="_blank"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="http://id.linkedin.com/pub/azza-mujibuz-zamzami/48/9b4/a79" target="_blank"><i class="icon-linkedin"></i></a>
                </div>

        </div><!--/#meet-the-team-->
        <?php } ?>
        </div>
        
    </section> <!--the-team-->

