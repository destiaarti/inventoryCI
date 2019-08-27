  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('stok/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Jenis Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Jenis') ?>">
        Stok Barang</a></li>
        <li class="active">Edit Data Stok Barang</li>
      </ol>
  </ol>
    </section>
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('stok/edit/'.$stok->id_stok));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Stok Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">

		<input type="hidden" name="id_stok" class="form-control" placeholder="ID stok" value="<?php echo $stok->id_stok ?>" readonly>
	
	<div class="form-group">
		<label>Barcode</label>
		<input type="text" name="barcode" class="form-control" placeholder="barcode" value="<?php echo $stok->barcode ?>" readonly>
	</div>
	<div class="form-group">
		<label>Lokasi</label>
				
			 
			<?php
				 //  $jenis = $this->db->get_where('jenis')->result();
				  // $jenis1 = $this->db->get_where('barang')->result();
				   	  
				   $id = $stok->lokasi;
                                       $get3 =$this->db->get_where("lokasi",array("id_lokasi" =>$id))->row();
					 
					  	$t = $get3->lokasi_barang;?>
    
		<input type="text" name="lokasi" class="form-control" placeholder="lokasi" value="<?php echo $t ?>" readonly>
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="stok" class="form-control" placeholder="stok" value="<?php echo $stok->stok ?>" required>
	</div>
	<div class="form-group">
		<label>Kondisi</label>
		<?php
		   $id = $stok->kondisi;
                                       $get3 =$this->db->get_where("kondisi",array("id_kondisi" =>$id))->row();
					 
					  	$ta = $get3->kondisi_barang;?>
    
					 
						
		<input type="text" name="kondisi" class="form-control" placeholder="kondisi" value="<?php echo $ta ?>" readonly>
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