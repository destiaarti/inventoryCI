
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('stok/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Stok
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Stok') ?>">
        Stok Barang</a></li>
        <li class="active">Tambah Stok Barang</li>
      </ol>
    </ol>
    </section>
<br>
<?php
if ($this->session->flashdata('notif')) {
   
 echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><span class='glyphicon glyphicon-wrench' aria-hidden='true'></span>";
    echo $this->session->flashdata('notif');
    echo "</div>";
}
$count_barang = $this->db->query("SELECT * FROM stok ORDER BY id_stok DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_stok;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "001";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('stok/tambah'));
?>

<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Stok</h4>
        </div>
        <div class="box-body">  
<div class="col-md-6">
	<div class="form-group">
		<label>ID Stok</label>
		<input type="text" name="id_stok" value="<?php echo $hasilkode ?>" id="id_stok" class="form-control" placeholder="ID STOK" readonly>
	</div>
	<div class="form-group">
		<label>Barcode</label>
	<select name="barcode" class="form-control" >
			<?php foreach ($barang as $barang) { 
			if ($barang->barcode !=0){?>
			
			<option value="<?php echo $barang->barcode?>"><?php echo $barang->barcode ?></option>
			<?php } }?>
		</select>
	</div>

		<div class="form-group">
		<label>Lokasi</label>
		<select name="lokasi" class="form-control" >
			<?php foreach ($lokasi as $lokasi) { 
			if ($lokasi->id_lokasi !=0){?>
			<option value="<?php echo $lokasi->id_lokasi?>"><?php echo $lokasi->lokasi_barang ?> </option>
			<?php } } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Kondisi</label>
		<select name="kondisi" class="form-control" >
			<?php foreach ($kondisi as $kondisi) { 
			if ($kondisi->id_kondisi !=0){?>
			<option value="<?php echo $kondisi->id_kondisi?>"><?php echo $kondisi->kondisi_barang ?> </option>
			<?php } }?>
		</select>
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="stok" class="form-control" placeholder="Jumlah" value="<?php echo set_value('stok') ?>" required>

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
</div></section>


	
</div>
<?php
//form close
echo form_close();
?>
</div>