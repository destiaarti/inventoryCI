<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporandatabrg extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('laporandatabrg_model');
			$this->load->model('jenis_model');
			$this->load->model('laporan_model');
			$this->load->model('type_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$barang 	= $this->barang_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'barang'		=> $barang,
							 'isi'		=> 'laporandatabrg/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>