
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="wrapper">
  <section class="content">

  

  <style type="text/css">
    body {
    background: url("<?php echo base_url('assets') ?>/image/logotower.jpg ?>")no-repeat center center fixed !important;
    background-size: 1390px 750px, cover !important;
    width: 100% !important;
    height: 100% !important;

    }
  </style>
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url('assets'); ?>/image/logo.png" width="238" height="59"><br><br>
    <a href="<?php echo base_url() ?> "><font color="white"><font size= 4px><b>SI Inventory Barang</b></a></font></font>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukan username dan password Anda</p>
    
    <?php 
    //Notifikasi
    if($this->session->flashdata('sukses')){
      echo '<div class="alert alert-danger">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    //error warning
    echo validation_errors('<div class="alert alert-warning">','</div>');

    //form open
    echo form_open(base_url('login'));
    ?>

    
    <form action="login" method="post" accept-charset="utf-8">

      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <a href="login">Kembali ke Beranda</a><br> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    
  </form>
  


   </div>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</section>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/back/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/back/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
<footer class="main-footer" style="margin-left: -5px; margin-top: -52px;">
    <div class="pull-right hidden-xs" >
      <b><a href="http://siskom.undip.ac.id/" target="_blank"> Departement of Computer Engineering &nbsp</a></b> <img src="http://ezatech.com/assets/image/undip.png"  class="img-circle" alt="1st" height="20px;">
    </div>
    <strong>Copyright &copy; 2018<a href="https://www.facebook.com/n.aynxqta?hc_ref=ARTe2q2q63HaAQ6m6V6mC2OAZy6wWtA1OxtQdSi-_SIusUO_f4HRaONIaMTei4aby68&fref=nf" target="_blank"> Teknik Komputer UNDIP</a>.</strong> All rights
    reserved.
  </footer>


