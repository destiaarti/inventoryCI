
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Transaksi Barang Keluar
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Barangkeluar') ?>">
        Transaksi Barang Keluar</a></li>
        <li class="active">Data Transaksi Barang Keluar/li>
      </ol>
    </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
      <div class="box-body" style="overflow-x: auto;">
    
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Transaksi Barang Keluar</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID Barang Keluar</th>
            <th>Tanggal Keluar</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Details</th>
          </tr>
            </thead>
             <tbody>
               <?php $i=1; foreach ($lapkeluar as $lapkeluar){ 
			   if($lapkeluar->jenis=="keluar"){
                                ?>
          <tr>
                 <td><?php echo $i ?></td>
                   <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->id_transaksi ?></div></font></td>
                   <td><?php echo $lapkeluar->tanggal ?></td>
                   <td><?php echo $lapkeluar->barcode ?></td>
                   <td><?php echo $lapkeluar->nama ?></td>
                   <!-- <td><?php echo $lapkeluar->lokasi ?></td> -->
                   
			   <td>
                      <button class ="btn btn-default" data-toggle = "modal" data-target="#myModal<?php echo $lapkeluar->id_laporan ?>" id="<?php echo $lapkeluar->id_laporan ?>" onclick="showDetails(this);">
                       Show Details </button>

			
<div class = "modal fade" id = "myModal<?php echo $lapkeluar->id_laporan ?>" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog" role="document">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="sr-only">&times;</span></button>
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Detail Barang
            </h4>
         </div>

         <div class = "modal-body">
          <table class="table table-bordered table-striped scroll" style="background-color:white;">
            

                 <tr> <th>ID Transaksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->id_transaksi?></div></font></td>
                </tr>
                <tr> <th>Tanggal Keluar</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->tanggal?></div></font></td>
                </tr>
                <tr> <th>Barcode</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->barcode?></div></font></td>
                </tr>
                <tr> <th>Nama Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->nama?></div></font></td>
                </tr>
         
                <tr> <th>Kondisi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->status?></div></font></td>
                </tr>
                <tr> <th>Lokasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->lokasi?></div></font></td>
                </tr>
                <tr> <th>Jumlah</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $lapkeluar->jml?></div></font></td>
                </tr>
                
         </div>
          
       </th></tr></table>
         <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
       
          </div>
        </div>
      </div>
    </div>
    </td>
  </tr>
  <?php $i++; } ?>
     <?php } ?>
</tbody>

</table>
</div>

</div>

<div class="box-body" >
      <form class="" action="<?php echo base_url('/laporanpdfkeluar') ?>" method = "post">
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
</div>
<script>
  function showDetails (button) {
    var id_laporan = button.id;
    }
  </script>