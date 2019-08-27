
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Barang Masuk
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Barangmasuk') ?>">
        Transaksi Barang Masuk</a></li>
        <li class="active">Data Transaksi Barang Masuk</li>
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
    <a href="<?php echo base_url('barangmasuk/tambah') ?>" title="Tambah Transaksi Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Transaksi Barang Masuk</h3>
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
            <th>Option</th>
            <th>Details</th>
            
          </tr>
            </thead>
              <tbody>
               <?php $i=1; foreach ($barangmasuk as $barangmasuk){ ?>

          <tr>
                 <td><?php echo $i ?></td>
                   <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->id_masuk ?></div></font></td>
                   <td><?php echo $barangmasuk->tanggal_masuk ?></td>
                   <td><?php echo $barangmasuk->barcode ?></td>
                   <td><?php echo $barangmasuk->nama_barang ?></td>
                   <td>

                   <?php if ($barangmasuk->approve == "no"){ ?>
                    <a href="<?php echo base_url('barangmasuk/edit/'.$barangmasuk->id_masuk) ?>" title="Edit User" class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i> Edit
                    </a>

                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $barangmasuk->id_masuk?>">
                                <i class="fa fa-trash-o"></i> Delete
                        </button>

                        <div class="modal modal-danger fade" id="Delete<?php echo $barangmasuk->id_masuk?>">
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
                                        <a href="<?php echo base_url('barangmasuk/delete/'.$barangmasuk->id_masuk) ?>" class="btn btn-outline pull-right"><i class="fa fa-trash-o"></i> Ya, hapus data ini </a> 
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                    <?php } else  if ($barangmasuk->approve == "yes") { ?>

                     <button type="button" class="btn btn-warning btn-xs" disabled>
                                <i class="fa fa-edit" disabled></i> Edit
                        </button>
                      
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $barangmasuk->id_masuk?>" disabled>
                                <i class="fa fa-trash-o " disabled></i> Delete
                        </button>
                    <?php } ?>
                   </td>
                <td>

                      <button class ="btn btn-default" data-toggle = "modal" data-target="#myModal<?php echo $barangmasuk->id_masuk ?>" id="<?php echo $barangmasuk->id_masuk ?>" onclick="showDetails(this);">
                       Show Details </button>

    
<div class = "modal fade" id = "myModal<?php echo $barangmasuk->id_masuk ?>" tabindex = "-1" role = "dialog" 
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
                        <?php if ($barangmasuk->approve == "no"){ ?>
                        <font size = "4px"><div class="label large label-danger"><b>Belum Disetujui</b></div></font>

                        <?php } else if ($barangmasuk->approve == "yes") { ?>
                        <font size = "4px"><div class="label large label-success"><b>Sudah Disetujui</b></div></font>
                        <?php } ?>
                  </td>
                </tr>

                 <tr> <th>ID Transaksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->id_masuk?></div></font></td>
                </tr>
                <tr> <th>Tanggal Masuk</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->tanggal_masuk?></div></font></td>
                </tr>
                <tr> <th>Barcode</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->barcode?></div></font></td>
                </tr>
                <tr> <th>Nama Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->nama_barang?></div></font></td>
                </tr>
                <tr> <th>Jenis Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->jenis_barang?></div></font></td>
                </tr>
                <tr> <th>Tipe Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->type_barang?></div></font></td>
                </tr>
                <tr> <th>Kondisi Barang</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->kondisi_barang?></div></font></td>
                </tr>
                <!-- <tr> <th>Tahun Produksi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->tahun?></div></font></td>
                </tr> -->
               
                <tr> <th>Lokasi</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->lokasi_barang?></div></font></td>
                </tr>
                <tr> <th>Jumlah</th>
                      <td><font size="4px"><div class="label label-default"><?php echo $barangmasuk->jumlah?></div></font></td>
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
    var id_masuk = button.id;
    }
  </script>
                

           

              

 
        

