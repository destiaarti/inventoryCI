<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('lokasi_model');
			$this->load->model('user_model');
	}

	public function index()
	{	
		$lokasi 	= $this->lokasi_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'lokasi'		=> $lokasi,
							 'isi'		=> 'lokasi/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_lokasi){
			//proteksi delete
			
			$lokasi = $this->lokasi_model->detail($id_lokasi);
			$data = array(	'id_lokasi'	=> $lokasi->id_lokasi);
			$this->lokasi_model->delete($data);
			helper_log("delete", "menghapus data lokasi barang");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('lokasi'),'refresh');
			}

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_lokasi','id_lokasi','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('lokasi_barang','lokasi_barang','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat','alamat','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('telepon','telepon','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Lokasi',
							'isi'		=>'lokasi/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_lokasi'			=> $i->post('id_lokasi'),
							 	'lokasi_barang'		=> $i->post('lokasi_barang'),
							 	'alamat'			=> $i->post('alamat'),
							 	'telepon'			=> $i->post('telepon')

							 	
 						);
				$this->lokasi_model->tambah($data);
				helper_log("tambah", "menambahkan data lokasi barang");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('lokasi'),'refresh');
			}
	}

	//Edit
	public function edit ($id_lokasi)
	{
		$lokasi = $this->lokasi_model->detail($id_lokasi);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_lokasi','id_lokasi','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('lokasi_barang','lokasi_barang','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat','alamat','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('telepon','telepon','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Lokasi : '.$lokasi->lokasi_barang,
							'lokasi'		=> $lokasi,
							'isi'		=>'lokasi/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_lokasi'		=> $id_lokasi,
								'lokasi_barang'		=> $i->post('lokasi_barang'),
								'alamat'			=> $i->post('alamat'),
							 	'telepon'			=> $i->post('telepon')
 						);
				$this->lokasi_model->edit($data);
				helper_log("edit", "mengubah data lokasi barang");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('lokasi'),'refresh');
			}
			//end masuk data base
	}

}