
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      	<a href="<?=base_url('mutasi/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Edit Data Mutasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Mutasi') ?>">
        Mutasi Barang</a></li>
        <li class="active">Edit Data Mutasi Barang</li>
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

//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('mutasi/edit/'.$mutasi->id_mutasi));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Edit Lokasi Pegawai</h4>
        </div>
        <div class="box-body">

<div class="col-md-6">
	<div class="form-group">
		<label>ID mutasi</label>
		<input type="text" name="id_mutasi" class="form-control" placeholder="ID mutasi" value="<?php echo $mutasi->id_mutasi ?>" readonly>
	</div>
	<div class="form-group">
		<label>No. mutasi</label>
		<input type="text" name="no_mutasi" class="form-control" placeholder="Nomor Mutasi" value="<?php echo $mutasi->no_mutasi ?>" required>
	</div>
<div class="form-group">
				<label>Barcode - Lokasi Asal - Kondisi</label>
		<select name="id_stok" class="form-control">

						<?php foreach ($stok as $stok) { ?>
			
		
			<option value="<?php echo $stok->id_stok ?>"<?php if($mutasi->id_stok==$stok->id_stok){echo "selected";} ?>><?php echo $stok->barcode ?> - <?php echo $stok->lokasi_barang  ?> - <?php echo $stok->kondisi_barang  ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
				<label>Barcode - Lokasi Tujuan - Kondisi</label>
		<select name="id_stok1" class="form-control">

						<?php foreach ($stok1 as $stok) { ?>
			
		
			<option value="<?php echo $stok->id_stok ?>"<?php if($mutasi->id_stok1==$stok->id_stok){echo "selected";} ?>><?php echo $stok->barcode ?> - <?php echo $stok->lokasi_barang ?> - <?php echo $stok->kondisi_barang  ?></option>
			<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label>Jumlah</label>
		<input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo $mutasi->jumlah ?>" >
		<a data-toggle="modal" data-target="#Modaa"><label>Lihat stok yang ada</label> </a>
	</div>


	<div class="form-group ">
		<div class="form-group ">
		<button type="submit" name ="submit" class="btn btn-primary btn-lg">
		<i class="fa fa-save"></i> Simpan Data</button>


	</div>
</div>
</div>
</div>
  <div class="modal fade" id="Modaa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel"><b><center>Daftar Stok Barang</b></center></h4>
                    </div>
                
                    <div class="modal-body">
							          
              
                            <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
 <th>Lokasi Barang</th>
            <th>Stok</th>
            <!-- <th>Option</th> -->
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($mutasi1 as $stok){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $stok->barcode ?></td>
                  <td><?php echo $stok->nama_barang ?></td>
                  <td><?php echo $stok->lokasi_barang ?></td>

                  <!-- <td><font size="4px"><div class="label label-default"><?php echo $stok->id_stok ?></div></font></td> -->
				 
				
				  
                  <td><?php echo $stok->stok ?></td>
                  <!-- <td>
                  <a href="<?php echo base_url('stok/edit/'.$stok->id_stok) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

              
                  </td> -->
          </tr>
              <?php $i++; } ?>
                </tbody>
                </table >

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-navy btn-flat" data-dismiss="modal">Tutup</button>
             
                    </div>
                
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