<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisikeluar extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('kondisikeluar_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$kondisikeluar 	= $this->kondisikeluar_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'kondisikeluar'		=> $kondisikeluar,
							 'isi'		=> 'kondisi/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_kondisi_keluar){
			//proteksi delete
			
			$kondisikeluar = $this->kondisikeluar_model->detail($id_kondisi_keluar);
			$data = array(	'id_kondisi_keluar'	=> $kondisikeluar->id_kondisi_keluar);
			$this->kondisikeluar_model->delete($data);
			helper_log("delete", "menghapus data kondisi barang keluar");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('kondisikeluar'),'refresh');
			}

	public function tambah ()
	{
		
		$valid = $this->form_validation;
		$this->load->model('kondisikeluar_model');

		$valid->set_rules('id_kondisi_keluar','ID Kondisi','required',
				array('required'	=> '%s harus diisi'));

		// $valid->set_rules('tahun','tahun','required',
		// 		array('required'	=> '%s harus diisi'));

		$valid->set_rules('kondisi','Kondisi','required',
				array('required'	=> '%s harus diisi'));

		

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Kondisi',
							'kondisikeluar'	=> 'kondisikeluar'
							'isi'		=>'kondisi/tambah2'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_kondisi_keluar'		=> $i->post('id_kondisi_keluar'),
								// 'tahun'				=> $i->post('tahun'),
								'kondisi'			=> $i->post('kondisi'),
							 	
 						);
				$this->kondisikeluar_model->tambah($data);
				helper_log("tambah", "menambahkan data kondisi barang keluar");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('kondisikeluar'),'refresh');
			}

		
	}

	//Edit
	public function edit ($id_kondisi_keluar)
	{
		$kondisikeluar = $this->kondisikeluar_model->detail($id_kondisi_keluar);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_kondisi_keluar','ID Kondisi','required',
				array('required'	=> '%s harus diisi'));

		// $valid->set_rules('tahun','tahun','required',
				// array('required'	=> '%s harus diisi'));

		$valid->set_rules('kondisi','kondisi','required',
				array('required'	=> '%s harus diisi'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Kondisikeluar : '.$kondisikeluar->kondisikeluar,
							'kondisikeluar'	=> $kondisikeluar,
							'isi'		=>'kondisi/edit2'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_kondisi_keluar'		=> $i->post('id_kondisi_keluar'),
								// 'tahun'				=> $i->post('tahun'),
								'kondisi'			=> $i->post('kondisi')
							 	
 						);
				$this->kondisikeluar_model->edit($data);
				helper_log("edit", "mengubah data kondisi barang keluar");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('kondisikeluar'),'refresh');
			}
			//end masuk data base
	}

}