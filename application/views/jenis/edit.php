  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('jenis/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Jenis Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Jenis') ?>">
        Jenis Barang</a></li>
        <li class="active">Edit Data Jenis Barang</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('jenis/edit/'.$jenis->id_jenis));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Jenis Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID jenis</label>
		<input type="text" name="id_jenis" class="form-control" placeholder="ID jenis" value="<?php echo $jenis->id_jenis ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama Jenis</label>
		<input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang" value="<?php echo $jenis->jenis_barang ?>" required>
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