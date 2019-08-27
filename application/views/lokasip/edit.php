  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<a href="<?=base_url('Lokasip/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Lokasi Pegawai
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Lokasip') ?>">
        Lokasi Pegawai</a></li>
        <li class="active">Edit Data Lokasi Pegawai</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('lokasip/edit/'.$lokasip->id_lokasip));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Lokasi Pegawai</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID lokasi</label>
		<input type="number" name="id_lokasip" class="form-control" placeholder="ID lokasip" value="<?php echo $lokasip->id_lokasip ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama lokasi</label>
		<input type="text" name="nama_lokasip" class="form-control" placeholder="lokasip Barang" value="<?php echo $lokasip->nama_lokasip ?>" required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat_lokasip" class="form-control" placeholder="Alamat" value="<?php echo $lokasip->alamat_lokasip ?>" required>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telp_lokasip" class="form-control" placeholder="Telepon" value="<?php echo $lokasip->telp_lokasip ?>" >
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