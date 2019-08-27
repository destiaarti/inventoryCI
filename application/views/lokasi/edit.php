  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<a href="<?=base_url('Lokasi/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Lokasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Lokasi') ?>">
        Lokasi Barang</a></li>
        <li class="active">Edit Data Lokasi Barang</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('lokasi/edit/'.$lokasi->id_lokasi));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Lokasi Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID lokasi</label>
		<input type="text" name="id_lokasi" class="form-control" placeholder="ID lokasi" value="<?php echo $lokasi->id_lokasi ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama lokasi</label>
		<input type="text" name="lokasi_barang" class="form-control" placeholder="lokasi Barang" value="<?php echo $lokasi->lokasi_barang ?>" required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $lokasi->alamat ?>" required>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $lokasi->telepon ?>" >
	</div>
	<div class="form-group ">
		<div class="form-group ">
		<button type="submit" name ="submit" class="btn btn-primary btn-lg">
		<i class="fa fa-save"></i> Simpan Data</button>

	<button type="reset" name ="reset" class="btn btn-success btn-lg">
		<i class="fa fa-times"></i> Reset</button>
	</div>
</div>
</div>
</div>
</section>
<?php
//form close
echo form_close();
?>
</div>