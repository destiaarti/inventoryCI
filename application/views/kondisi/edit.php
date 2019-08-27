  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<a href="<?=base_url('Kondisi/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Kondisi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Kondisi') ?>">
        Kondisi Barang</a></li>
        <li class="active">Edit Data Kondisi Barang</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('kondisi/edit/'.$kondisi->id_kondisi));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Kondisi Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID kondisi</label>
		<input type="text" name="id_kondisi" class="form-control" placeholder="ID kondisi" value="<?php echo $kondisi->id_kondisi ?>" readonly>
	</div>
	<!-- <div class="form-group">
		<label>Tahun</label>
		<input type="number" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo $kondisi->tahun ?>" required>
	</div> -->
	<div class="form-group">
		<label>Kondisi</label>
		<input type="text" name="kondisi_barang" class="form-control" placeholder="Kondisi" value="<?php echo $kondisi->kondisi_barang?>" required>
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