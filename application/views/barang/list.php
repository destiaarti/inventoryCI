
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Barang') ?>">
        Data Barang</a></li>
        <li class="active">Data Barang</li>
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
    <a href="<?php echo base_url('barang/tambah') ?>" title="Tambah Jenis Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Barang</h3>
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
            <th>Keterangan</th>

            
            <th>Option</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($barang as $barang){
if($barang->barcode !=0){				  ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $barang->id_barang ?></div></font></td>
                  <td><?php echo $barang->barcode ?></td>
                  <td><?php echo $barang->nama_barang ?></td>
                  <td><?php echo $barang->jenis_barang ?></td>
                  <td><?php echo $barang->type_barang ?></td>
                  <td><?php echo $barang->keterangan ?></td>
      
                  <!-- <td><?php echo $barang->stok ?></td> -->
                  <td>
                  <a href="<?php echo base_url('barang/edit/'.$barang->id_barang) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

                  <?php
                  //link delete
                  include('delete.php');
                  ?>
                  </td>
          </tr>
<?php $i++;} } ?>
                </tbody>
                </table >
              </div>
            </font>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->