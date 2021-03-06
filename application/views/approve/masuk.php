
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Validasi Transaksi Barang Masuk
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('approve/masuk') ?>">
        Barang Masuk</a></li>
        <li class="active">Validasi Transaksi Barang Masuk</li>
      </ol>
    </ol>
    </section>
    <br>
 <?php
  //notifikasi
 if($this->session->flashdata('sukses'))
 {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
 }
 ?>
    <!-- Main content -->
    <section class="content">
      <div class="box-body" style="overflow-x: auto;">
   
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Validasi Transaksi Barang Masuk</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID Barang Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Validasi</th>
            <th>Details</th>
            
          </tr>
            </thead>
              <tbody>
               <?php $i=1;
			   foreach ($approvelist as $approvelist){ ?>

          <tr>
                 <td><?php echo $i ?></td>
                   <td><?php echo $approvelist->id_masuk ?></td>
                   <td><?php echo $approvelist->tanggal_masuk ?></td>
                   <td><?php echo $approvelist->barcode ?></td>
                   <td><?php echo $approvelist->nama_barang ?></td>
                   <td>
                        <?php if ($approvelist->approve == "no"){ ?>
                        <a href="<?php echo base_url(); ?>approve/masuk/setujui/<?php echo $approvelist->id_masuk ?>" class="btn btn-danger"><b>Belum Disetujui</b></a>

                        <?php } else if ($approvelist->approve == "yes") { ?>
                        <font size = "4px"><div class="label large label-success"><b>Sudah Disetujui</b></div></font>
                        <?php } ?>
                  </td>

                <td>

                      <button class ="btn btn-default" data-toggle = "modal" data-target="#myModal<?php echo $approvelist->id_masuk ?>" id="<?php echo $approvelist->id_masuk ?>" onclick="showDetails(this);">
                       Show Details </button>

    
<div class = "modal fade" id = "myModal<?php echo $approvelist->id_masuk ?>" tabindex = "-1" role = "dialog" 
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
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->id_masuk?></div></font></td>
                </tr>
                <tr> <th>Tanggal Masuk</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->tanggal_masuk?></div></font></td>
                </tr>
                <tr> <th>Barcode</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->barcode?></div></font></td>
                </tr>
                <tr> <th>Nama Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->nama_barang?></div></font></td>
                </tr>
                <tr> <th>Jenis Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->jenis_barang?></div></font></td>
                </tr>
                <tr> <th>Tipe Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->type_barang?></div></font></td>
                </tr>
                <tr> <th>Kondisi Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->kondisi?></div></font></td>
                </tr>
               <!--  <tr> <th>Tahun Produksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->tahun?></div></font></td>
                </tr> -->
         
                <tr> <th>Lokasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->lokasi_barang?></div></font></td>
                </tr>
                <tr> <th>Jumlah</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->jumlah?></div></font></td>
                </tr>
               <!--  <tr> <th>Harga Per Satuan</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->harga?></div></font></td>
                </tr> -->
         </div>
       </th></tr></table>
         <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </div>
   </div>
  
</div>
 </td>
          </tr>
              <?php $i++; } ?>
</tbody>
     </table >
        </section> 
         </div>

<script>
  function showDetails (button) {
    var id_masuk = button.id;
    }
  </script>
                

           

              

 
        

