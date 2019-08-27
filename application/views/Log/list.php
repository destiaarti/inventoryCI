
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Log Aktivitas
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Log Aktivitas</li>
      </ol>
    </ol>
    </section>
    <br>
 
    <!-- Main content -->
    <section class="content">
      <div class="box-body" style="overflow-x: auto;">
    
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Log Aktivitas</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Log-time</th>
            <th>User</th>
            <th>Action</th>
            <th>Description</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($jenis as $jenis){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $jenis->id_jenis ?></div></font></td>
                  <td><?php echo $jenis->jenis_barang ?></td>
                  <td>
                  <a href="<?php echo base_url('jenis/edit/'.$jenis->id_jenis) ?>" title="Edit User"
                  class="btn btn-warning btn-xs">
                      <i class ="fa fa-edit"></i>Edit
                      </a>

                  <?php
                  //link delete
                  include('delete.php');
                  ?>
                  </td>
          </tr>
              <?php $i++; } ?>
                </tbody>
                </table >
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->