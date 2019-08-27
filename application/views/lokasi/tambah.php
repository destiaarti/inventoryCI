  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('Lokasi/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Data Lokasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Lokasi') ?>">
        Lokasi Barang</a></li>
        <li class="active">Tambah Data Lokasi Barang</li>
      </ol>
  </ol>
    </section>
<?php
$count_barang = $this->db->query("SELECT * FROM lokasi ORDER BY id_lokasi DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_lokasi;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "100";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('lokasi/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Data Lokasi Barang</h4>
        </div>
        <div class="box-body">  
<div class="col-md-6">
	<div class="form-group">
		<label>ID Lokasi</label>
		<input type="text" name="id_lokasi" value="<?php echo $hasilkode ?>" id="id_lokasi" class="form-control" placeholder="ID Lokasi" readonly>
	</div>
	<div class="form-group">
		<label>Nama Lokasi</label>
		<input type="text" name="lokasi_barang" class="form-control" placeholder="Lokasi Barang" value="<?php echo set_value('lokasi_barang') ?>" required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required>
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