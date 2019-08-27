<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmasuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('laporan_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('lokasi_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$lapmasuk 	= $this->laporan_model->lap();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'lapmasuk'		=> $lapmasuk,
							 'isi'		=> 'Laporanmasuk/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>