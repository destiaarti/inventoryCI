<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><font color="#eae878"><b>Main Navigation</b></font></li>
       <li>
        <a href="<?php echo base_url('dashboard') ?>">
        <i class= "fa fa-dashboard"></i><span> Beranda </span>
         <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="header"><font color="#eae878"><b>Manajemen</b></font></li>
    
        <?php if ($this->session->userdata('akses_level') == "Admin") { ?>

        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('jenis') ?>"><i class="fa fa-circle-o"></i>Jenis Barang </a></li>
            <li><a href="<?php echo base_url('type') ?>"><i class="fa fa-circle-o"></i>Tipe Barang</a></li>
            <li><a href="<?php echo base_url('lokasi') ?>"><i class="fa fa-circle-o"></i>Lokasi Barang</a></li>
            <li><a href="<?php echo base_url('kondisi') ?>"><i class="fa fa-circle-o"></i>Kondisi Barang</a></li>
        </ul>

        </li>
        <?php } ?>

        <?php if ($this->session->userdata('akses_level') == "Admin" or $this->session->userdata('akses_level') == "User") { ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('barang') ?>"><i class="fa fa-table"></i> Data Barang</a></li>
            <li><a href="<?php echo base_url('barang/tambah') ?>"><i class="fa fa-plus"></i>Tambah Barang</a></li>
            <li><a href="<?php echo base_url('stok') ?>"><i class="fa fa-cart-plus"></i> Data Stok</a></li>
        </ul>
        </li>
        <?php } ?>

        
        <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pegawai') ?>"><i class="fa fa-table"></i>Data Pegawai</a></li>
            <li><a href="<?php echo base_url('pegawai/tambah') ?>"><i class="fa fa-plus"></i>Tambah Data Pegawai</a></li>
            <li><a href="<?php echo base_url('lokasip') ?>"><i class="fa fa-map-pin"></i>Tambah Lokasi Pegawai</a></li>
        </ul>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i>
            <span>User Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('user') ?>"><i class="fa fa-table"></i>Data User Administrator</a></li>
            <li><a href="<?php echo base_url('user/tambah') ?>"><i class="fa fa-plus"></i>Tambah User Administrator</a></li>
        </ul>
        </li>  
        <?php } ?> 

        <?php if ($this->session->userdata('akses_level') == "Pimpinan") { ?>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i>
            <span>Validasi Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url('approve/masuk') ?>"><i class="fa fa-circle-o"></i>Barang Masuk</a></li>
            <li><a href="<?php echo base_url('approve/keluar') ?>"><i class="fa fa-circle-o"></i>Barang Keluar</a></li>
            <li><a href="<?php echo base_url('approve/mutasi') ?>"><i class="fa fa-circle-o"></i>Mutasi Barang</a></li>
        </ul>
        </li>  
        <?php } ?>      


        <?php if ($this->session->userdata('akses_level') == "Admin" or $this->session->userdata('akses_level') == "User") { ?>
        <li class="header"><font color="#eae878"><b>Transaksi</b></font></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Barang Masuk </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('barangmasuk') ?>"><i class="fa fa-table"></i>Data Barang Masuk</a></li>
            <li><a href="<?php echo base_url('barangmasuk/tambah') ?>"><i class="fa fa-plus"></i>Tambah Data Barang Masuk</a></li>  
        </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i>
            <span>Barang Keluar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('barangkeluar') ?>"><i class="fa fa-table"></i>Data Barang Keluar</a></li>
            <li><a href="<?php echo base_url('barangkeluar/tambah') ?>"><i class="fa fa-plus"></i>Tambah Data Barang Keluar</a></li>    
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-exchange"></i>
            <span>Mutasi Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('mutasi') ?>"><i class="fa fa-table"></i>Data Mutasi Barang</a></li>
            <li><a href="<?php echo base_url('mutasi/tambah') ?>"><i class="fa fa-plus"></i>Tambah Data Mutasi Barang</a></li>    
        </ul>
        </li>
        <?php } ?>

        

        <?php if ($this->session->userdata('akses_level') == "Admin" or $this->session->userdata('akses_level') == "Pimpinan"){ ?>
        <li class="header"><font color="#eae878"><b>Laporan</b></font></li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>Laporan Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporanmasuk') ?>"><i class="fa fa-circle-o"></i>Laporan Barang Masuk </a></li>
            <li><a href="<?php echo base_url('laporankeluar') ?>"><i class="fa fa-circle-o"></i>Laporan Barang Keluar</a></li>
            <li><a href="<?php echo base_url('laporanmutasi')?>"><i class="fa fa-circle-o"></i>Laporan Mutasi Barang</a></li>
            
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-o"></i>
            <span>Laporan Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporandatabrg')?>"><i class="fa fa-circle-o"></i>Laporan Data Barang</a></li>
            <li><a href="<?php echo base_url('laporaninvbrg/list')?>"><i class="fa fa-circle-o"></i>Laporan Data Inventaris</a></li>
            
            
        </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Laporan Stok</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            
            <li><a href="<?php echo base_url('laporanstok')?>"><i class="fa fa-circle-o"></i>Laporan Kendali Stok</a></li>
        </ul>
        </li>


        <?php } ?>  

        

        
      </ul>
    </section>
</aside>

    <!-- Main content -->
    
    <!-- /.sidebar -->
  
