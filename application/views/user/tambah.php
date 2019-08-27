  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
      	<a href="<?=base_url('User/');?>" class="btn btn-primary btn-sm fa fa-backward "></a>
        Tambah Data User Administrator
        <small>PGASCOM Indonesia</small>
      </h1>

      <ol class="breadcrumb">
      	<ol class="breadcrumb">
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('User') ?>">
        User</a></li>
        <li class="active">Tambah Data User Administrator</li>
      </ol>
  </ol>
    </section>
<?php
$count_barang = $this->db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->id_user;
 }
if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "001";
  }
//Error Warning
echo validation_errors('<div class="alert alert-warning" >','</div>');

//form open
echo form_open(base_url('user/tambah'));
?>
<section class="content">
      <div class="box box-primary box-solid"> <!-- satu box -->
        
        <div class="box-header with-border">
          
          <h4 class="box-title">Form Tambah Data Pengguna</h4>
        </div>
        <div class="box-body">  
<div class="col-md-6">
	<div class="form-group">
		<label>ID User</label>
		<input type="text" name="id_user" value="<?php echo $hasilkode ?>" id="id_user" class="form-control" placeholder="ID User" readonly>
	</div>

	<div class="form-group">
		<label>Nama user</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>" required>
	</div>

	<div class="form-group">
		<label>Email user</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
	</div>

	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Level Hak Akses User</label>
		<select name="akses_level" class="form-control" >
		<option value="Admin">Admin</option>
		<option value="User">User</option>
		<option value="User">Pimpinan</option>
		</select>
	</div>
	
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
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
	

<?php
//form close
echo form_close();
?>
</div>