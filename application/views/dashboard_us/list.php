<!-- Info boxes -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Dashboard') ?>">
        Dashboard</a></li>
        
      </ol>
    </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> <?php echo count($barang) ?> </h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="<?php echo base_url('Barang') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> <?php echo count($pegawai) ?> </h3>

              <p>Data Pegawai</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Data Pegawai<i class="fa fa-arrow-circle-right"></i></a>
            
              
            </div>
            <!-- /.info-box-content -->
          </div>

        <!-- fix for small devices only -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3> <?php echo count($barangmasuk) ?> </h3>

              <p>Data Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('Barangmasuk') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            
              
            </div>
            <!-- /.info-box-content -->
          </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> <?php echo count($barangkeluar) ?> </h3>

              <p> Data Barang Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="<?php echo base_url('Barangkeluar') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            
              
            </div>
            <!-- /.info-box-content -->
          </div>
        <!-- /.col -->
      </div>
      </div>
    </section>
  </div>


      <!-- /.row -->


      