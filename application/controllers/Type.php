<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('type_model');
			$this->load->model('user_model');
	}

	public function index()
	{	
		$type 	= $this->type_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'type'		=> $type,
							 'isi'		=> 'type/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_type){
			//proteksi delete
			
			$type = $this->type_model->detail($id_type);
			$data = array(	'id_type'	=> $type->id_type);
			$this->type_model->delete($data);
			helper_log("delete", "menghapus data tipe barang");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('type'),'refresh');
			}

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_type','id_type','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('type_barang','type_barang','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Jenis',
							'isi'		=>'type/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_type'			=> $i->post('id_type'),
							 	'type_barang'		=> $i->post('type_barang'),
							 	
 						);
				$this->type_model->tambah($data);
				helper_log("tambah", "menambahkan data tipe barang");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('type'),'refresh');
			}
	}

	//Edit
	public function edit ($id_type)
	{
		$type = $this->type_model->detail($id_type);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_type','id_type','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('type_barang','type_barang','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Jenis : '.$type->type_barang,
							'type'		=> $type,
							'isi'		=>'type/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_type'		=> $id_type,
								'type_barang'		=> $i->post('type_barang'),
 						);
				$this->type_model->edit($data);
				helper_log("edit", "mengubah data tipe barang");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('type'),'refresh');
			}
			//end masuk data base
	}

}