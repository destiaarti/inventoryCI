<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Kendali Stok
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Laporan Kendali Stok</li>

      </ol>
    </ol>
    <br>
    </section>

    <section class="content">
    	<div class="box box-info">
		<div class="box-body" style="overflow-x: auto;">
            <a>
                <form class="pull-left" action="<?php echo base_url('laporanpdfstok') ?>" method = "post">
                <!-- <input type="hidden" name="keyword" value="<?php echo $mailbox->id_mailbox?>"> -->
                <input  class="btn btn-primary" type="submit" name="Search" value = "Cetak"/>
            </form><br></a>   
         </div>
     </div>
    </section>
   </div>
