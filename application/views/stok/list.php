
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Stok Barang
        <small>PGASCOM Indonesia</small>
      </h1>

            <!-- /.box-header -->

      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Stok') ?>">
        Data Stok Barang</a></li>
        <li class="active">Data Stok Barang</li>
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
	   <p>
    <a href="<?php echo base_url('stok/tambah') ?>" title="Tambah Jenis Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class='row'>
        <!-- left column -->
		
        <div class='col-md-12'>
		 <div class="nav-tabs-custom">
                
				<ul class="nav nav-tabs">
				
                  <li class="active"><a href="#fa-icons" data-toggle="tab">Stok Lengkap</a></li>
                  <li><a href="#karyawan" data-toggle="tab">Bedasar Lokasi</a></li>
				                 
                     <li><a href="#sendiri" data-toggle="tab">Bedasar Kondisi</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome icons -->
                  <div class="tab-pane active" id="fa-icons" >
                    <section id="new">
					
                      <h4 class="page-header">Stok Lengkap</h4>

      
           
   <ul class="bs-glyphicons">
                                  <div class='box-header'>
                    <div class='col-md-12'>
					  <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Stok Lengkap Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
      
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>

            
            <th>Edit</th>
            <th>Detail</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($stok as $barang){
			  ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $barang->barcode ?></td>
                  <td><?php echo $barang->nama_barang ?></td>
                  <td><?php echo $barang->lokasi_barang ?></td>
                 
      
                  <td><?php echo $barang->stok ?></td>
                  <td><?php echo $barang->kondisi_barang ?></td>
                  <td>
                  <a href="<?php echo base_url('stok/edit/'.$barang->id_stok) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

                 
                  </td>
				  <td>
				        <button class ="btn btn-success"  data-toggle="modal" data-target="#Modaa<?php echo $barang->lokasi ?><?php echo $barang->barcode ?><?php echo $barang->kondisi ?>"><label>Detail</label>  </button>
			  <?php $i++;} ?>
			 <?php $n=1; foreach ($stok as $barang){
			  ?>    
  <div class="modal fade" id="Modaa<?php echo $barang->lokasi ?><?php echo $barang->barcode ?><?php echo $barang->kondisi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel"><b><center>List Transaksi
						</br> <font color=brown><?php echo $barang->nama_barang ?></font></br> di <font color=brown><?php echo $barang->lokasi_barang?></font> kondisi<font color=brown> <?php echo $barang->kondisi_barang ?></font> </b></center></h4>
                    </div>
                
                    <div class="modal-body">
							          
              
                            <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
                    <th>ID Barang</th>
					      <th>Jenis Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Barcode</th>
            <th>Nama Barang</th>

      
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <!-- <th>Option</th> -->
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($lap as $barang2){
				
				if(($barang->lokasi_barang==$barang2->lokasi||$barang2->lokasi1==$barang->lokasi_barang)&&$barang->barcode==$barang2->barcode&&$barang->kondisi_barang==$barang2->status){  
				//if($barang2->lokasi1=="Gudang2"){ 
				//if($barang2->lokasi1!=$barang->lokasi_barang){
			 
			?>
			
          <tr>
                  <td><?php echo $i ?></td>
                   <td><font size="4px"><div class="label label-default"><?php echo $barang2->id_transaksi ?></div></font></td>
                   <td><?php echo $barang2->jenis ?></td>
                   <td><?php echo $barang2->tanggal ?></td>
                   <td><?php echo $barang2->barcode ?></td>
                   <td><?php echo $barang2->nama ?></td>
                  <td>
				  <?php
									    
       
	   if($barang2->jenis!="mutasi" ){
		   ?>
             <?php     echo $barang2->lokasi ?>
	    <?php  }
 else{?>
	 <?php echo $barang2->lokasi ?>
				   ke <?php echo $barang2->lokasi1?>
<?php  }  ?>
				  
				  
				 </td>
                 
      
                  <td><?php echo $barang2->jml ?></td>
                  <td><?php echo $barang2->status ?></td>
                 
          </tr>
				<?php $i++; } }?>
                </tbody>
                </table >

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-navy btn-flat" data-dismiss="modal">Tutup</button>
             
                    </div>
                
                </div>
            </div>
        </div>
<?php $n++;}  ?>
		</td>

		</tr>

                </tbody>
                </table >
              </div>
           
                    </div><!-- /.box-body -->
</ul>
                    </section>

                  
                  </div><!-- /#fa-icons -->
                  <!-- glyphicons-->
                  <div class="tab-pane" id="karyawan">
   <h4 class="page-header">Bedasar Lokasi</h4>
                    
           
   <ul class="bs-glyphicons">
                                  <div class='box-header'>
                    <div class='col-md-5'>
					  <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Stok Lokasi Barang</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>
      
            <th>Lokasi</th>
            
           
            <th>Jumlah</th>
            <th>Detail</th>
            

            
           
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($stok1 as $barang){
			  ?>
          <tr>
                  <td><?php echo $i ?></td>
             
                  <td><?php  echo $barang->lokasi_barang  ?></td>
                 
      
                  <td><?php echo $barang->total ?></td>
           <td>

                      <button class ="btn btn-success"  data-toggle="modal" data-target="#Modaa<?php echo $barang->lokasi ?>"><label>Detail</label>  </button>
  <?php $i++;} ?>			
			<?php $n=1; foreach ($stok as $barang){
			  ?>    
  <div class="modal fade" id="Modaa<?php echo $barang->lokasi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel"><b><center>Daftar Stok di <?php echo $barang->lokasi_barang ?></b></center></h4>
                    </div>
                
                    <div class="modal-body">
							          
              
                            <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
        
<th>Barcode</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <!-- <th>Option</th> -->
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($stok as $barang2){
				if($barang2->lokasi==$barang->lokasi){  ?>
          <tr>
                  <td><?php echo $i ?></td>
                   <td><?php echo $barang2->barcode ?></td>
                  <td><?php echo $barang2->nama_barang ?></td>
                  <td><?php echo $barang2->lokasi_barang ?></td>
                 
      
                  <td><?php echo $barang2->stok ?></td>
                  <td><?php echo $barang2->kondisi_barang ?></td>
                 
          </tr>
              <?php $i++; }} ?>
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
        </div>
      </div>
	  <?php $n++;}  ?>
    </td>

          </tr>

                </tbody>
                </table >
              </div>
           
                    </div><!-- /.box-body -->
</ul>
                  </div><!-- /#ion-icons -->
                
			
				                    <div class="tab-pane" id="sendiri">

                                  <h4 class="page-header">Bedasar Kondisi</h4>

      
           
   <ul class="bs-glyphicons">
                                  <div class='box-header'>
                    <div class='col-md-5'>
					  <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Stok Kondisi Barang</h3>
		  
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
          <tr>
            <th width="5%">No</th>

 <th>Kondisi</th>           
		   <th>Jumlah</th>
		   <th>Detail</th>
           

            

          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($stok2 as $barang1){
			  ?>
          <tr>
                  <td><?php echo $i ?></td>
                  
                 
       <td><?php echo $barang1->kondisi_barang ?></td>
                  <td><?php echo $barang1->total1 ?></td>
				  <td>
                  <button class ="btn btn-success"  data-toggle="modal" data-target="#Modaa<?php echo $barang1->kondisi_barang ?>"><label>Detail</label>  </button>
				 
  <?php $i++;} ?>
				 <?php $n=1; foreach ($stok as $barang1){
			  ?>    
  <div class="modal fade" id="Modaa<?php echo $barang1->kondisi_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
 <h4 class="modal-title" id="myModalLabel"><b><center>Daftar Stok dengan kondisi <?php echo $barang1->kondisi_barang ?></b></center></h4>                       
					   
                    </div>
                
                    <div class="modal-body">
							          
              
                            <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
        
<th>Barcode</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <!-- <th>Option</th> -->
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($stok as $barang3){
				if($barang1->kondisi_barang==$barang3->kondisi_barang){  ?>
          <tr>
                  <td><?php echo $i ?></td>
                   <td><?php echo $barang3->barcode ?></td>
                  <td><?php echo $barang3->nama_barang ?></td>
                  <td><?php echo $barang3->lokasi_barang ?></td>
                 
      
                  <td><?php echo $barang3->stok ?></td>
                  <td><?php echo $barang3->kondisi_barang ?></td>
               
                 
          </tr>
              <?php $i++; }} ?>
                </tbody>
                </table >

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-navy btn-flat" data-dismiss="modal">Tutup</button>
             
                    </div>
                
                </div>
            </div>
        </div>
<?php $n++;}  ?>
		</td> 

			 </tr>

                </tbody>
                </table >
              </div>
           
                    </div><!-- /.box-body -->
</ul>
                  </div><!-- /#ion-icons -->	           
				
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            <!-- general form elements -->
           
            </div><!-- /.col -->
        </div><!-- /.row -->

        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->