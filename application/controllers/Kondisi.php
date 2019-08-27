<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('kondisi_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$kondisi 	= $this->kondisi_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'kondisi'		=> $kondisi,
							 'isi'		=> 'kondisi/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_kondisi){
			//proteksi delete
			
			$kondisi = $this->kondisi_model->detail($id_kondisi);
			$data = array(	'id_kondisi'	=> $kondisi->id_kondisi);
			$this->kondisi_model->delete($data);
			helper_log("delete", "menghapus data kondisi barang");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('kondisi'),'refresh');
			}

	public function tambah ()
	{
		
		$valid = $this->form_validation;

		$valid->set_rules('id_kondisi','id_kondisi','required',
				array('required'	=> '%s harus diisi'));

		// $valid->set_rules('tahun','tahun','required',
		// 		array('required'	=> '%s harus diisi'));

		$valid->set_rules('kondisi_barang','kondisi_barang','required',
				array('required'	=> '%s harus diisi'));

		

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Kondisi',
							'isi'		=>'kondisi/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_kondisi'		=> $i->post('id_kondisi'),
								// 'tahun'				=> $i->post('tahun'),
								'kondisi_barang'			=> $i->post('kondisi_barang'),
							 	
 						);
				$this->kondisi_model->tambah($data);
				helper_log("tambah", "menambahkan data kondisi barang");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('kondisi'),'refresh');
			}

		
	}

	//Edit
	public function edit ($id_kondisi)
	{
		$kondisi = $this->kondisi_model->detail($id_kondisi);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_kondisi','id_kondisi','required',
				array('required'	=> '%s harus diisi'));

		// $valid->set_rules('tahun','tahun','required',
				// array('required'	=> '%s harus diisi'));

		$valid->set_rules('kondisi_barang','kondisi_barang','required',
				array('required'	=> '%s harus diisi'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Kondisi : '.$kondisi->kondisi_barang,
							'kondisi'	=> $kondisi,
							'isi'		=>'kondisi/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_kondisi'		=> $i->post('id_kondisi'),
								// 'tahun'				=> $i->post('tahun'),
								'kondisi_barang'			=> $i->post('kondisi_barang')
							 	
 						);
				$this->kondisi_model->edit($data);
				helper_log("edit", "mengubah data kondisi barang");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('kondisi'),'refresh');
			}
			//end masuk data base
	}

}