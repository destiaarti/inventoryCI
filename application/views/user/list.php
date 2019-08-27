
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User Administrator
        <small>PGASCOM Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('User') ?>">
        User</a></li>
        <li class="active">Data User Administrator</li>

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
    <a href="<?php echo base_url('user/tambah') ?>" title="Tambah User Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
        </a>
    </p>
    <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Pengguna</h3>
        </div>
        <div class="box-body">  
                <table id="example1" class="table table-bordered table-striped scroll" style="background-color:white;">
      
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>ID User</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Akses Level</th>
            <th>Option</th>
          </tr>
            </thead>
              <tbody>
              <?php $i=1; foreach ($user as $user){ ?>
          <tr>
                  <td><?php echo $i ?></td>
                  <td><font size="4px"><div class="label label-default"><?php echo $user->id_user ?></div></font></td>
                  <td><?php echo $user->nama ?></td>
                  <td><?php echo $user->email ?></td>
                  <td><?php echo $user->username ?></td>
                  <td><?php echo $user->password ?></td>
                  
                  <td><font size="4px"><?php if($user->akses_level == 'Admin'){
                      echo '<div class="label label-info">Administrator</div>';
                    }
                    else if ($user->akses_level == 'User' ){
                      echo '<div class="label label-success">User</div>';
                    }
                    else if ($user->akses_level == 'Pimpinan' ){
                      echo '<div class="label label-primary">Pimpinan</div>';
                    }
                    ?></font></td>
                  <td>
                  <a href="<?php echo base_url('user/edit/'.$user->id_user) ?>" title="Edit User"
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