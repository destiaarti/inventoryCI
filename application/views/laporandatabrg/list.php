
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Data Barang
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Laporan Data Barang</li>

      </ol>
    </ol>
    </section>
 <?php
  //notifikasi
 if($this->session->flashdata('sukses'))
 {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
 }
 ?>
    <!-- Main content -->
   <section class="content">
      <div class="box-body" style="overflow-x: auto;">
    
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Data Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
          
            <th>ID Barang</th>
            <th>Barcode</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Tipe/Merk</th>
         
            
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($barang as $barang){ 
			  if($barang->barcode!=00){?>
          <tr>
                  <td><?php echo $i ?></td>
              
                  <td><?php echo $barang->id_barang ?></td>
                  <td><?php echo $barang->barcode ?></td>
                  <td><?php echo $barang->nama_barang ?></td>
                  <td><?php echo $barang->jenis_barang ?></td>
                  <td><?php echo $barang->type_barang ?></td>
       
          </tr>
              <?php $i++; } } ?>
                </tbody>
                </table >
              </div>
              <div class="box-body">
            <a>
                <form class="pull-left" action="<?php echo base_url('/laporanpdf') ?>" method = "post">
                <!-- <input type="hidden" name="keyword" value="<?php echo $mailbox->id_mailbox?>"> -->
                <input  class="btn btn-primary" type="submit" name="Search" value = "Cetak"/>
            </form></a>   
          </div>
            </div>
                
          

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->