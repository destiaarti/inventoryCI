<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('layanan_model');
		$this->load->model('galeri_model');
		$this->load->model('blog_model');
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$konfigurasi = $this->konfigurasi_model->home();
		$layanan 	 = $this->layanan_model->home();
		$slider 	 = $this->galeri_model->slider();
		$galeri 	 = $this->galeri_model->galeri();
		$blog		 = $this->blog_model->home();

		
		$data = array(  'title'			=> $konfigurasi->namaweb.' - '.$konfigurasi->tagline, 
						'keyword'		=> $konfigurasi->namaweb.' - '.$konfigurasi->tagline.','.$konfigurasi->keyword,
						'deskripsi' 	=> $konfigurasi->deskripsi,
						'konfigurasi'	=> $konfigurasi,
						'layanan'		=> $layanan,
						'slider'		=> $slider,
						'galeri'		=> $galeri,
						'blog'			=> $blog,
						'isi'			=> 'home/list'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
