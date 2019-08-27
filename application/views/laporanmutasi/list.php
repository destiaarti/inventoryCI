
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mutasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>
     <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Mutasi') ?>">
        Mutasi Barang</a></li>
        <li class="active">Data Mutasi Barang</li>
      </ol>
    </ol>
    </section>
    <br>
 
    <!-- Main content -->
    <section class="content">
      <div class="box-body" style="overflow-x: auto;">
    
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Data Mutasi Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>

            <th>No. Mutasi</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
      
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Jumlah</th>
            
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($lapmutasi as $lapmutasi){
if($lapmutasi->jenis=="mutasi"){				  ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $lapmutasi->id_transaksi ?></td>
                  <td><?php echo $lapmutasi->tanggal?></td>
                  <td><?php echo $lapmutasi->nama ?></td>
             
       
                  <td><?php echo $lapmutasi->lokasi ?></td>
                  <td><?php echo $lapmutasi->lokasi1 ?></td>
                  <td><?php echo $lapmutasi->jml ?></td>

                  
          </tr>
              <?php $i++; } ?>
			  <?php } ?>
                </tbody>
                </table >
              
  </div>
</div>
<div class="box-body" >
      <form class="" action="<?php echo base_url('/laporanpdfmutasi') ?>" method = "post">
       <div class="row"> 
                   <div class="col-md-3">
                  <label for="tanggal1" class="control-label">Tanggal Awal :</label>
                 
                    <input class="form-control" name="tanggal1" placeholder="Tanggal Masuk" type="date">
                  </div>
                  <div class="col-md-3">
                    <label for="tanggal2" class="control-label">Tanggal Akhir :</label>
                  
                    <input class="form-control" name="tanggal2" placeholder="Tanggal Masuk" type="date">

                  </div>
                  <div class="col-md-8"> 
                  </div>

        </div>
        <div class="row"> 
        <div class="col-md-2"> 
        <br>          
        <input  class="btn btn-primary" type="submit" name="Search" value = "Cetak"/> 
        </div>
  </div>
      </form>  
    </div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     