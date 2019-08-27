<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanstok extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('stok_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$stok 	= $this->stok_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'stok'		=> $stok,
							 'isi'		=> 'Laporanstok/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>