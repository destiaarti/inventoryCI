<!-- Info boxes -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1>
        Beranda
        
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Dashboard') ?>">
        Beranda</a></li>
        
      </ol>
    </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
       <?php
  //notifikasi
 if($this->session->flashdata('sukses'))
 {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
 }
 ?>
      <div class="box box-primary">
        <div class="box-header with-border">
         <marquee> <h3 class="box-title">Selamat Datang di Sistem Informasi Inventarisasi Barang</h3> </marquee>

          
        </div>
        

        <div class="box-body">
           <div class="tile-stats6">
      
                 <h1>  <font color="black"><strong>Sistem Informasi Inventarisasi Barang</strong></font></h1>
                           <h3> <font color="black">Kantor Regional Cabang Surabaya </strong></font>  </h3>
                <h3> <font color="black" size="4">Jl. Menanggal Mge No.12, Menanggal, Gayungan, Kota SBY, Jawa Timur 60234</strong></font>  </h3>
           </div>
                </div>

      </div>

        <!-- /.box-body -->
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
            <a class="small-box-footer"></a>
            
              
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
            <a href="#" class="small-box-footer"></a>
            
              
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
           <a href="#" class="small-box-footer"></a>
            
              
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
            <a href="#" class="small-box-footer"></a>
            
              
            </div>
            <!-- /.info-box-content -->
          </div>
        <!-- /.col -->
        <!-- <div class="box-header with-border">
          <h3 class="box-title"> CEK KONDISI!</h3>
            <div class="box-body">
              <div class="col-md-8">
                <tr>
                   <td colspan="4">
                      <?php $attributes = array('class' => 'row'); ?>
                      <?php echo form_open('post/search',$attributes);?>
                        <input type="text" name="keyword" placeholder="search" class="form-control col-md-4">
                        <br>
                        <input type="submit" value="Cari" class="btn btn-warning col-md-1">
                      <?php echo form_close();?>    
                  </td>
                </tr>
              </div>
            </div>
          </div> -->



    <div class="box-body" style="overflow-x: auto;"> 
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          
          <h3 class="box-title">Log Aktivitas <?php echo $this->session->userdata('akses_level'); ?></h3>
          <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
          <div class="box-tools pull-right">
          <p>
          <a href="<?php echo base_url('dashboard/reset_log') ?>" title="Reset Log" class="btn btn-danger">
        <i class="fa fa-times"></i> Reset Log
        </a>
        </p>
          </div>
        <?php } else { ?>
         <div class="box-tools pull-right">
          <p>
          <a href="#" title="Reset Log" class="btn btn-danger" disabled>
        <i class="fa fa-times"></i> Reset Log
        </a>
        </p>
          </div>
        <?php } ?>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Log-time</th>
            <th>User</th>
            
            <th>Description</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($log as $log){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $log->log_time ?></div></font></td>
                  <td><?php echo $log->log_user ?></td>
                  <!-- <td><?php echo $log->log_tipe ?></td> -->
                  <td><?php echo $log->log_desc ?></td>
          </tr>
              <?php $i++; } ?>
                </tbody>
                </table >
              </div>
            </div>
    <!-- <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Lalulintas Barang Tahun <?= date('Y') ?></h3>
          <p class="pull-right" style="margin-bottom:0; margin-left: 10px;"><span class="label label-success" style="padding:0; width:10px; height:10px; border: 1px solid white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Barang Keluar</p>
          <p class="pull-right" style="margin: 0"><span class="label label-primary" style="padding:0; width:10px; height:10px; border: 1px solid white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Barang Masuk</p>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="barChart" style="height:230px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
<!--     </div> -->
	 <!-- <div class="col-md-6">  
          <div class="box">
            <!-- /.box-header -->
            <!-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Kenaikan Suhu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			 <canvas id="canvas"  width="700"  height="480"></canvas>
			    <?php
                      foreach($data1 as $data1){
                          $tanggal_masuk[] = $data1->tanggal_masuk;
                          $jumlah[] = (float) $data1->jumlah;
                      }
                  ?>
 
    <!--Load chart js-->
   <!-- <!-- <!-- <!-- 
			         </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
            <!-- /.box-body -->
          </div>
        </div>
      </div>
</div>

<!-- <div class="box-body" style="overflow-x: auto;"> 
<div class="row">
<div class="col-md-12">
<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>>
</div>

</div>
</div>
      </div> -->
    </div>
</section>
</div>
 <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
    <script>
 
            var lineChartData = {
                labels : <?php echo json_encode($tanggal_masuk);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($jumlah);?>
                    }
 
                ]
                 
            }
 
        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
         
    </script>

      <!-- /.row -->


      