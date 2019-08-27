
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Validasi Mutasi Barang
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('approve/mutasi') ?>">
        Mutasi Barang</a></li>
        <li class="active">Validasi Mutasi Barang</li>
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
 }elseif($this->session->flashdata('notifa'))
 {
  echo '<div class="alert alert-danger">';
  echo $this->session->flashdata('notifa');
  echo '</div>';
 }
 
 ?>
    <!-- Main content -->
    <section class="content">
      <div class="box-body" style="overflow-x: auto;">
   
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Validasi Mutasi Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
      
            <th>No Mutasi</th>
            <th>Tanggal Mutasi</th>
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
                   <td><?php echo $approvelist->id_mutasi ?></td>
                   <td><?php echo $approvelist->tanggal ?></td>
                   <td><?php echo $approvelist->barcode ?></td>
                   <td><?php echo $approvelist->nama_barang ?></td>
                   <td>
                        <?php if ($approvelist->approve == "no"){ ?>
                        <a href="<?php echo base_url(); ?>approve/mutasi/setujui/<?php echo $approvelist->id_mutasi ?>" class="btn btn-danger"><b>Belum Disetujui</b></a>

                        <?php } else if ($approvelist->approve == "yes") { ?>
                        <font size = "4px"><div class="label large label-success"><b>Sudah Disetujui</b></div></font>
                        <?php } ?>
                  </td>

                <td>

                      <button class ="btn btn-default" data-toggle = "modal" data-target="#myModal<?php echo $approvelist->id_mutasi ?>" id="<?php echo $approvelist->id_mutasi ?>" onclick="showDetails(this);">
                       Show Details </button>

    
<div class = "modal fade" id = "myModal<?php echo $approvelist->id_mutasi ?>" tabindex = "-1" role = "dialog" 
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

                 <tr> <th>ID Mutasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->id_mutasi?></div></font></td>
                </tr>
                <tr> <th>Tanggal Mutasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->tanggal?></div></font></td>
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
           
               <!--  <tr> <th>Tahun Produksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->tahun?></div></font></td>
                </tr> -->
              
               
                <tr> <th>Lokasi Awal</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->lokasi?></div></font></td>
                </tr>
				<tr> <th>Lokasi Tujuan</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $approvelist->lokasi1?></div></font></td>
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
    var id_mutasi = button.id;
    }
  </script>
                

           

              

 
        

