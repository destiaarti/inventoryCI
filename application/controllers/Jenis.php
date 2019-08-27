<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('jenis_model');
			$this->load->model('user_model');
	}

	public function index()
	{	
		$jenis 	= $this->jenis_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'jenis'		=> $jenis,
							 'isi'		=> 'jenis/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_jenis){
			//proteksi delete
			
			$jenis = $this->jenis_model->detail($id_jenis);
			$data = array(	'id_jenis'	=> $jenis->id_jenis);
			$this->jenis_model->delete($data);
			helper_log("delete", "menghapus data jenis barang");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('jenis'),'refresh');
			}

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_jenis','id_jenis','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('jenis_barang','jenis_barang','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Jenis',
							'isi'		=>'jenis/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_jenis'			=> $i->post('id_jenis'),
							 	'jenis_barang'		=> $i->post('jenis_barang'),
							 	
 						);
				$this->jenis_model->tambah($data);
				helper_log("tambah", "menambahkan data jenis barang");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('jenis'),'refresh');
			}
	}

	//Edit
	public function edit ($id_jenis)
	{
		$jenis = $this->jenis_model->detail($id_jenis);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_jenis','id_jenis','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('jenis_barang','jenis_barang','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Jenis : '.$jenis->jenis_barang,
							'jenis'		=> $jenis,
							'isi'		=>'jenis/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_jenis'		=> $id_jenis,
								'jenis_barang'		=> $i->post('jenis_barang'),
 						);
				$this->jenis_model->edit($data);
				helper_log("edit", "mengubah data jenis barang");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('jenis'),'refresh');
			}
			//end masuk data base
	}

}