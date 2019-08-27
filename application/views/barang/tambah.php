  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
      	<a href="<?=base_url('barang/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Data Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Barang') ?>">
        Data Barang</a></li>
        <li class="active">Tambah Data Barang</li>
      </ol>
    </ol>
    </section>
</br>
<?php
$count_barang = $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_barang;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 4, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "1000";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('barang/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Data Barang</h4>
        </div>
        <div class="box-body"> 
<div class="col-md-6">
	<div class="form-group">
		<label>ID Barang</label>
		<input type="text" name="id_barang" value="<?php echo $hasilkode ?>" id="id_barang" class="form-control" placeholder="ID Barang" readonly>
	</div>
	<div class="form-group">
		<label>Barcode</label>
		<input type="number" name="barcode" class="form-control" placeholder="Barcode" value="<?php echo set_value('barcode') ?>" required>
	</div>
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo set_value('nama_barang') ?>" required>
	</div>
	
	<div class="form-group">
		<label>Jenis Barang</label>
		<select name="id_jenis" class="form-control">
			<?php foreach ($jenis as $jenis) { 
			if ($jenis->id_jenis !=0){?>
			<option value="<?php echo $jenis->id_jenis?>"><?php echo $jenis->jenis_barang ?></option>
			<?php } }?>
		</select>
	</div>
	
</div> 

<div class="col-md-6">
	<div class="form-group">
		<label>Tipe Barang</label>
		<select name="id_type" class="form-control">
			<?php foreach ($type as $type) {
if ($type->id_type !=0){?>				
			<option value="<?php echo $type->id_type ?>"><?php echo $type->type_barang ?></option>
			<?php }} ?>
		</select>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo set_value('keterangan') ?>" required>
	</div>
	
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