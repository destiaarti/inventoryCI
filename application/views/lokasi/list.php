
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Lokasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Lokasi') ?>">
        Lokasi Barang</a></li>
        <li class="active">Data User Administrator</li>

      </ol>
    </ol>
    </section>
    <br>
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
        <p>
    <a href="<?php echo base_url('lokasi/tambah') ?>" title="Tambah Lokasi Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Lokasi Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
    
      
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID Lokasi</th>
            <th>Lokasi</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Option</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($lokasi as $lokasi){
if($lokasi->id_lokasi !=00){					  ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $lokasi->id_lokasi ?></div></font></td>
                  <td><?php echo $lokasi->lokasi_barang ?></td>
                  <td><?php echo $lokasi->alamat ?></td>
                  <td><?php echo $lokasi->telepon ?></td>
                  <td>
                  <a href="<?php echo base_url('lokasi/edit/'.$lokasi->id_lokasi) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

                  <?php
                  //link delete
                  include('delete.php');
                  ?>
                  </td>
          </tr>
              <?php $i++; }} ?>
                </tbody>
                </table >
                </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->