<section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <?php
                //Error Warning
                echo validation_errors('<div class="alert alert-warning" >','</div>');
                //form open
                echo form_open(base_url('kontak/tambah'));
                ?>
                    <h1>Contact Us</h1>
                    <p>Hubungi kami untuk layanan IT terbaik bagi perusahaan anda.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://ezatech.com">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="media-body">
                    <p>Segera hubungi kami untuk membahas apa yang dapat kami lakukan untuk memajukan usaha / bisnis anda sehinga terus berkembang dengan layanan IT dan design kami.</p>
                        
                        <abbr title="Office">Office :</abbr> Gemah Permai, D 16A Semarang, Indonesia 50273<br>
                        <abbr title="Phone">Phone :</abbr> <?php echo $konfigurasi->telepon ?> <br>
                        <abbr title="Email">Email :</abbr> <?php echo $konfigurasi->email ?><br>
                        <br>
                </div>
            </div><!--/.col-md-6-->
            
            <div class="col-sm-6">
                <div class="media-body">
                    <img class="img-responsive img-blog" src="assets/template/front/images/ezatect_contact.jpg" width="100%" alt="" />
                </div>
            </div><!--/.col-md-6-->
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <h4>Contact Form</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required="required" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-info btn-lg">Send Message</button>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <textarea name="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                        </div>
                    </div>
                </form>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4>Our Location</h4>
                <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=<?php echo $konfigurasi->map ?> width="600" height="450" frameborder="0" style="border:0"></iframe>
                
            </div><!--/.col-sm-4-->
        </div>
    </section><!--/#contact-page-->
    <div class="clearfix"></div>

<?php
//Form close
echo form_close();
?>