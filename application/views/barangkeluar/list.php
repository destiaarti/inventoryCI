
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Barang Keluar
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
    <p>
    <a href="<?php echo base_url('barangkeluar/tambah') ?>" title="Tambah Transaksi Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Transaksi Barang Keluar</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID Transaksi</th>
            <th>Tanggal Keluar</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <!-- <th>Lokasi</th> -->
               
            <th>Option</th>
            <th>Details</th>
          </tr>
            </thead>
             <tbody>
               <?php $i=1; foreach ($barangkeluar as $barangkeluar){ ?>
          <tr>
                 <td><?php echo $i ?></td>
                   <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->id_keluar ?></td>
                   <td><?php echo $barangkeluar->tanggal_keluar ?></td>
                   <td><?php echo $barangkeluar->barcode ?></td>
                   <td><?php echo $barangkeluar->nama_barang ?></td>
                   <!-- <td><?php echo $barangkeluar->lokasi_barang ?></td> -->
                   
                   <td>
                    <?php if ($barangkeluar->approve == "no"){ ?>
                    <a href="<?php echo base_url('barangkeluar/edit/'.$barangkeluar->id_keluar) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i> Edit
                      </a>

                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $barangkeluar->id_keluar?>">
        <i class="fa fa-trash-o "></i> Delete
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $barangkeluar->id_keluar?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Menghapus Data</h4>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
                <a href="<?php echo base_url('barangkeluar/delete/'.$barangkeluar->id_keluar) ?>" class="btn btn-outline pull-right"><i class="fa fa-trash-o"></i> Ya, hapus data ini </a> 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

               <?php } else  if ($barangkeluar->approve == "yes") { ?>

                     <button type="button" class="btn btn-warning btn-xs" disabled>
                                <i class="fa fa-edit" disabled></i> Edit
                        </button>
                      
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $barangkeluar->id_keluar?>" disabled>
                                <i class="fa fa-trash-o " disabled></i> Delete
                        </button>
                    <?php } ?>
                   </td>
                <td>

                      <button class ="btn btn-default" data-toggle = "modal" data-target="#myModal<?php echo $barangkeluar->id_keluar ?>" id="<?php echo $barangkeluar->id_keluar ?>" onclick="showDetails(this);">
                       Show Details </button>

    
<div class = "modal fade" id = "myModal<?php echo $barangkeluar->id_keluar ?>" tabindex = "-1" role = "dialog" 
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
            <tr><th> Validasi</th><td>
                        <?php if ($barangkeluar->approve == "no"){ ?>
                        <font size = "4px"><div class="label large label-danger"><b>Belum Disetujui</b></div></font>

                        <?php } else if ($barangkeluar->approve == "yes") { ?>
                        <font size = "4px"><div class="label large label-success"><b>Sudah Disetujui</b></div></font>
                        <?php } ?>
                  </td>
                </tr>

                 <tr> <th>ID Transaksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->id_keluar?></div></font></td>
                </tr>
                <tr> <th>Tanggal Keluar</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->tanggal_keluar?></div></font></td>
                </tr>
                <tr> <th>Barcode</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->barcode?></div></font></td>
                </tr>
                <tr> <th>Nama Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->nama_barang?></div></font></td>
                </tr>
                <tr> <th>Jenis Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->jenis_barang?></div></font></td>
                </tr>
                <tr> <th>Tipe Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->type_barang?></div></font></td>
                </tr>
                <tr> <th>Kondisi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->kondisi_barang?></div></font></td>
                </tr>
                <tr> <th>Lokasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->lokasi_barang?></div></font></td>
                </tr>
                <tr> <th>Jumlah</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangkeluar->jumlah?></div></font></td>
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
</tbody>
</table>
</div>
</div>
</div>
</section>
</div>
<script>
  function showDetails (button) {
    var id_keluar = button.id;
    }
  </script>