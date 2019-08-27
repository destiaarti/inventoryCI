<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporaninvbrg extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('laporaninvbrg_model');
			$this->load->model('kondisi_model');
			$this->load->model('laporan_model');
			
			
	}

	public function index()
	{	
		$barang 	= $this->laporaninvbrg_model->listing();
		$laporaninv 	= $this->laporaninvbrg_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'barang'	=> $barang,
							'laporaninv'	=> $laporaninv,
							
							 'isi'		=> 'laporaninvbrg/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>