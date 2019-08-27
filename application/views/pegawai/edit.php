  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<a href="<?=base_url('Pegawai/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Pegawai
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Pegawai') ?>">
        Pegawai</a></li>
        <li class="active">Edit Data Pegawai</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('pegawai/edit/'.$pegawai->id_pegawai));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Pegawai</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">

	<div class="form-group">
		<label>ID pegawai</label>
		<input type="text" name="id_pegawai" class="form-control" placeholder="ID pegawai" value="<?php echo $pegawai->id_pegawai ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama pegawai</label>
		<input type="text" name="nama_pegawai" class="form-control" placeholder="pegawai Barang" value="<?php echo $pegawai->nama_pegawai ?>" required>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pegawai->alamat ?>" required>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="no_hp" class="form-control" placeholder="Telepon" value="<?php echo $pegawai->no_hp?>" >
	</div>
	
</div>
<div class="col-md-6">
	
	
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pegawai->email?>" >
	</div>
	<div class="form-group">
		<label>Lokasi Pegawai</label>
		<select name="id_lokasip" class="form-control">
			<?php foreach ($lokasip as $lokasip) { ?>
			<option value="<?php echo $lokasip->id_lokasip?>"><?php echo $lokasip->nama_lokasip?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" >
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