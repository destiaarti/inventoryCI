  <div class="content-wrapper">

  	<section class="content-header">
      <h1>
      	<a href="<?=base_url('Dashboard/');?>" class="btn btn-primary btn-sm fa fa-backward "></a> Update Profil
        <small>PGASCOM Indonesia</small>
      </h1>
     <ol class="breadcrumb">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('Profile') ?>">
        Profile</a></li>

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

//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('profile'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Update Profile</h4>
        </div>
        <div class="box-body">
<div class="col-md-6">
	<div class="form-group">
		<label>Nama user</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user->nama ?>" required>
	</div>

	<div class="form-group">
		<label>Email user</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
	</div>

	<div class="form-group">
		<label>Level Hak Akses User</label>
		<input type="text" name="akses_level" class="form-control" value="<?php echo $user->akses_level ?>" readonly>
	</div>
</div> 

<div class="col-md-6">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
	</div>

	<div class="form-group ">
		<div class="form-group ">
		<button type="submit" name ="submit" class="btn btn-primary btn-lg">
		<i class="fa fa-save"></i> Simpan Data</button>

	<button type="reset" name ="reset" class="btn btn-success btn-lg">
		<i class="fa fa-times"></i> Reset</button>
	</div>
</div>
</div>
</div>
</section>
</div>
<?php
//form close
echo form_close();
?>
</div>