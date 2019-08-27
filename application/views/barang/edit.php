  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	
        <h1>
        	<a href="<?=base_url('barang/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        	Edit Data Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('barang') ?>">
        Data Barang</a></li>
        <li class="active">Edit Data Barang</li>
      </ol>
  </ol>

    </section>

    
<?php
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('barang/edit/'.$barang->id_barang));
?>
<br>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Data Barang</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>ID Barang</label>
		<input type="text" name="id_barang" class="form-control" placeholder="ID Barang" value="<?php echo $barang->id_barang ?>" readonly>
	</div>
	<div class="form-group">
		<label>Barcode</label>
		<input type="number" name="barcode" class="form-control" placeholder="Barcode" value="<?php echo $barang->barcode ?>" required>
	</div>
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $barang->nama_barang ?>" required>
	</div>
	<div class="form-group">
		<label>Jenis Barang</label>
		<select name="id_jenis" class="form-control">
			
			<?php 
				 //  $jenis = $this->db->get_where('jenis')->result();
				  // $jenis1 = $this->db->get_where('barang')->result();
				   	   $data['jenis'] = $this->db->get_where('jenis')->result();
				   $id = $barang->id_jenis;
                                                                          if (!empty($jenis)) {
																			 
                                        foreach ($jenis as $row) {
											if ($row->id_jenis !=0){
                                            echo "<option value='$row->id_jenis'";
                                            echo $id == $row->id_jenis ? 'selected' : '';
                                            echo">$row->jenis_barang</option>";
                                        }
																		  }}
                                        ?>
		</select>
	</div>
	
</div> 

<div class="col-md-6">
	
	<div class="form-group">
		<label>Tipe Barang</label>
		<select name="id_type" class="form-control">
			<?php foreach ($type as $type) { ?>
		<?php
				 //  $jenis = $this->db->get_where('jenis')->result();
				  // $jenis1 = $this->db->get_where('barang')->result();
				   	   $type = $this->db->get_where('type')->result();
				   $id = $barang->id_type;
                                                                          if (!empty($type)) {
																		
                                        foreach ($type as $row) {
												  if ($row->id_type !=0){
                                            echo "<option value='$row->id_type'";
                                            echo $id == $row->id_type ? 'selected' : '';
                                            echo">$row->type_barang</option>";
                                        }
                                    }
                                        ?>
			<?php }} ?>
		</select>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $barang->keterangan ?>" required>
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
