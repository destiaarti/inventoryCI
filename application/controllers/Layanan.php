<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$layanan		 = $this->layanan_model->layanan();
		$konfigurasi      = $this->konfigurasi_model->listing();

		$data = array(	'title'			=> 'Layanan - '.$konfigurasi->namaweb,
						'deskripsi' 	=> 'Layanan - '.$konfigurasi->namaweb,
						'keyword'		=> 'Layanan - '.$konfigurasi->namaweb,
						'konfigurasi'	=> $konfigurasi,
						'layanan'		=> $layanan,
					  	'isi'			=> 'layanan/list'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function read()
	{
		$data = array('title'	=> 'Detail Layanan-Ezatech',
					  'isi'		=>	'layanan/read'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */