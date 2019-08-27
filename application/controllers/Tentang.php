<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('team_model');

	}

	public function index()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();
		$team 			= $this->team_model->listing();
		$data 			= array( 'title'			=> 'Tentang'.' - '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
								 'keyword'			=> 'Tentang'.' - '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
					 			 'konfigurasi'		=> $konfigurasi,
					 			 'team'				=> $team,
					 			 'isi'				=> 'tentang/list'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/Tentang.php */