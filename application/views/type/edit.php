  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('Type/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Tipe Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Type') ?>">
        Tipe Barang</a></li>
        <li class="active">Edit Data User Administrator</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('type/edit/'.$type->id_type));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Tipe Barang</h4>
        </div>
        <div class="box-body">
        
<div class="col-md-6">
	<div class="form-group">
		<label>ID tipe</label>
		<input type="text" name="id_type" class="form-control" placeholder="ID type" value="<?php echo $type->id_type ?>" readonly>
	</div>
	<div class="form-group">
		<label>Nama tipe</label>
		<input type="text" name="type_barang" class="form-control" placeholder="type Barang" value="<?php echo $type->type_barang ?>" required>
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