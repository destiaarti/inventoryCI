<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmutasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('mutasi_model');
			$this->load->model('lokasi_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('user_model');
			$this->load->model('stok_model');
			$this->load->model('laporan_model');
			
	}

	public function index()
	{	
		$lapmutasi 	= $this->laporan_model->lap();
		
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'lapmutasi'		=> $lapmutasi,
							 'isi'		=> 'Laporanmutasi/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>