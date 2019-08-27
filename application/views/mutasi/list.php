
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mutasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
     <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Mutasi') ?>">
        Mutasi Barang</a></li>
        <li class="active">Data Mutasi Barang</li>
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
    <a href="<?php echo base_url('mutasi/tambah') ?>" title="Tambah Transaksi Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Mutasi Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>

            <th>No. Mutasi</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Tipe/Merk Barang</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Jumlah</th>
            <th>Option</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($mutasi as $mutasi){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $mutasi->no_mutasi ?></td>
                  <td><?php echo $mutasi->tanggal?></td>
                  <td><?php echo $mutasi->nama_barang ?></td>
                  <td><?php echo $mutasi->jenis_barang ?></td>
                  <td><?php echo $mutasi->type_barang ?></td>
                  <td><?php echo $mutasi->lokasi ?></td>
                  <td><?php echo $mutasi->lokasi1 ?></td>
                  <td><?php echo $mutasi->jumlah ?></td>


                  <td>
                       <?php if ($mutasi->approve == "no"){ ?>
                    <a href="<?php echo base_url('mutasi/edit/'.$mutasi->id_mutasi) ?>" title="Edit User" class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i> Edit
                    </a>

                        

                        <?php
                  //link delete
                  include('delete.php');
                   ?>

                    <?php } else  if ($mutasi->approve == "yes") { ?>

                     <button type="button" class="btn btn-warning btn-xs" disabled>
                                <i class="fa fa-edit" disabled></i> Edit
                        </button>
                      
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $mutasi->id_mutasi?>" disabled>
                                <i class="fa fa-trash-o " disabled></i> Delete
                        </button>
                    <?php } ?>
                  

                 
                  </td>
          </tr>
              <?php $i++; } ?>
                </tbody>
                </table >
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     