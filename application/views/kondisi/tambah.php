  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('Kondisi/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Data Kondisi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Kondisi') ?>">
        Kondisi Barang</a></li>
        <li class="active">Tambah Data Kondisi Barang</li>
      </ol>
    </section>
    <?php
$count_barang = $this->db->query("SELECT * FROM kondisi ORDER BY id_kondisi DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_kondisi;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "031";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('kondisi/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Data Kondisi Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID Kondisi</label>
		<input type="text" name="id_kondisi" value="<?php echo $hasilkode ?>" id="id_kondisi" class="form-control" placeholder="ID Kondisi" readonly>
	</div>
	<!-- <div class="form-group">
		<label>Tahun</label>
		<input type="number" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo set_value('id_tahun') ?>" required>
	</div> -->
	<div class="form-group">
		<label>Kondisi</label>
		<input type="text" name="kondisi_barang" class="form-control" placeholder="Kondisi Barang" value="<?php echo set_value('kondisi_barang') ?>" required>
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


	
</div>
<?php
//form close
echo form_close();
?>

 <?php
$count_barang = $this->db->query("SELECT * FROM kondisi ORDER BY id_kondisi DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_kondisi;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "031";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('kondisi/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Data Kondisi Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
  <div class="form-group">
    <label>ID Kondisi</label>
    <input type="text" name="id_kondisi" value="<?php echo $hasilkode ?>" id="id_kondisi" class="form-control" placeholder="ID Kondisi" readonly>
  </div>
  <!-- <div class="form-group">
    <label>Tahun</label>
    <input type="number" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo set_value('id_tahun') ?>" required>
  </div> -->
  <div class="form-group">
    <label>Kondisi</label>
    <input type="text" name="kondisi" class="form-control" placeholder="Kondisi Barang" value="<?php echo set_value('kondisi') ?>" required>
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


  
</div>
<?php
//form close
echo form_close();
?>
</div>
</div>