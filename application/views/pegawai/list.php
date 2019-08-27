
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pegawai
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Pegawai') ?>">
        Pegawai</a></li>
        <li class="active">Data Pegawai</li>

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
    <a href="<?php echo base_url('pegawai/tambah') ?>" title="Tambah Pegawai Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Pegawai</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID Pegawai</th>
            <th>Gambar</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Lokasi</th> 
            <th>Option</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($pegawai as $pegawai){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $pegawai->id_pegawai ?></div></font></td>
                   <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$pegawai->gambar) ?>" width="60" class="img img-thumbnail"></td>
                  <td><?php echo $pegawai->nama_pegawai ?></td>
                  <td><?php echo $pegawai->alamat ?></td>
                  <td><?php echo $pegawai->no_hp ?></td>
                  <td><?php echo $pegawai->email ?></td>
                  <td><?php echo $pegawai->nama_lokasip ?></td>
                  
                  
                  <td>
                  <a href="<?php echo base_url('pegawai/edit/'.$pegawai->id_pegawai) ?>" title="Edit Pegawai"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

                  <?php
                  //link delete
                  include('delete.php');
                  ?>
                  </td>
          </tr>
              <?php $i++; } ?>
                </tbody>
                </table >
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->