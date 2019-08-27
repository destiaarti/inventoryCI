<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('mailbox_model');
	}

	public function index()
	{	$konfigurasi 	= $this->konfigurasi_model->listing();

		$data 			= array('title'			=> 'Kontak'.' - '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
								'keyword'		=> 'Kontak'.' - '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
								'deskripsi'		=> 'Kontak'.' - '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
								'konfigurasi'	=> $konfigurasi,
					  			'isi'			=>	'kontak/list'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array('required'	=> '%s harus diisi'));
		$valid->set_rules('subject','Subject','required',
				array('required'	=> '%s harus diisi'));
		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));
		$valid->set_rules('message','Message','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah mail',
							'isi'		=>'kontak/tambah'
		);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'nama'			=> $i->post('nama'),
								'subject'		=> $i->post('subject'),
							 	'email'			=> $i->post('email'),	 	
							 	'message'		=> $i->post('message')
 						);
				$this->mailbox_model->tambah($data);
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('kontak'),'refresh');
			}
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */