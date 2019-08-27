  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
      	<a href="<?=base_url('barangmasuk/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Data Barang Masuk
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Barangmasuk') ?>">
        Transaksi Barang Masuk</a></li>
        <li class="active">Tambah Transaksi Barang Masuk</li>
      </ol>
    </ol>
    </section>
    

<?php
$count_barang = $this->db->query("SELECT * FROM barangmasuk ORDER BY id_masuk DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_masuk;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 8, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "11011010";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('barangmasuk/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Transaksi Barang Masuk</h4>
        </div>
        <div class="box-body">  

<div class="col-md-6">
	<div class="form-group">
		<label>ID Transaksi</label>
		<input type="text" name="id_masuk" value="<?php echo $hasilkode ?>" id="id_masuk" class="form-control" placeholder="ID Transaksi" readonly>
	</div>
	<div class="form-group">
			<label>Barcode - Lokasi - Kondisi</label>
		<select name="id_stok" class="form-control">
			<?php foreach ($stok as $stok) { ?>
			<option value="<?php echo $stok->id_stok?>"><?php echo $stok->barcode ?> - <?php echo $stok->lokasi_barang ?>  - <?php echo $stok->kondisi_barang ?> </option>
			<?php } ?>
		</select>
	</div>
	
	
	
	



	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah') ?>" required>
		<a data-toggle="modal" data-target="#Modaa"><label>Lihat stok yang ada</label> </a>
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
  <div class="modal fade" id="Modaa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel"><b><center>Daftar Stok Barang</b></center></h4>
                    </div>
                
                    <div class="modal-body">
							          
                <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
           <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Kondisi</th>

            <th>Stok</th>
            
          </tr>
            </thead>
              <tbody>
               <?php $i=1; foreach ($barangmasuk1 as $barangmasuk){ ?>

          <tr>
                 <td><?php echo $i ?></td>
                   <td><?php echo $barangmasuk->barcode ?></td>
                   <td><?php echo $barangmasuk->nama_barang ?></td>
                   <td><?php echo $barangmasuk->lokasi_barang ?></td>
                   <td><?php echo $barangmasuk->kondisi_barang ?></td>
                   <td><?php echo $barangmasuk->stok ?></td>
              

                  <!-- <td><font size="4px"><div class="label label-default"><?php echo $stok->id_stok ?></div></font></td> -->
				 
				
				  

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
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-navy btn-flat" data-dismiss="modal">Tutup</button>
             
                    </div>
                
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