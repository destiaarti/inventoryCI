<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('log_model');
			
	}

	public function index()
	{	
		$log 	= $this->log_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'log'		=> $log,
							 'isi'		=> 'dashboard'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	
		}
		?>