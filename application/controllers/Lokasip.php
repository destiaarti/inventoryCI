<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasip extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('lokasip_model');
			$this->load->model('user_model');
	}

	public function index()
	{	
		$lokasip 	= $this->lokasip_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'lokasip'		=> $lokasip,
							 'isi'		=> 'lokasip/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function delete($id_lokasip){
			//proteksi delete
			
			$lokasip = $this->lokasip_model->detail($id_lokasip);
			$data = array(	'id_lokasip'	=> $lokasip->id_lokasip);
			$this->lokasip_model->delete($data);
			helper_log("delete", "menghapus data lokasi pegawai");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('lokasip'),'refresh');
			}

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_lokasip','id_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama_lokasip','nama_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat_lokasip','alamat_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('telp_lokasip','telp_lokasip','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Lokasip',
							'isi'		=>'lokasip/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_lokasip'			=> $i->post('id_lokasip'),
							 	'nama_lokasip'		=> $i->post('nama_lokasip'),
							 	'alamat_lokasip'			=> $i->post('alamat_lokasip'),
							 	'telp_lokasip'			=> $i->post('telp_lokasip')

							 	
 						);
				$this->lokasip_model->tambah($data);
				helper_log("tambah", "menambahkan data lokasi pegawai");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('lokasip'),'refresh');
			}
	}

	//Edit
	public function edit ($id_lokasip)
	{
		$lokasip = $this->lokasip_model->detail($id_lokasip);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_lokasip','id_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama_lokasip','nama_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat_lokasip','alamat_lokasip','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('telp_lokasip','telp_lokasip','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Lokasip : '.$lokasip->nama_lokasip,
							'lokasip'		=> $lokasip,
							'isi'		=>'lokasip/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_lokasip'		=> $id_lokasip,
								'nama_lokasip'		=> $i->post('nama_lokasip'),
								'alamat_lokasip'			=> $i->post('alamat_lokasip'),
							 	'telp_lokasip'			=> $i->post('telp_lokasip')
 						);
				$this->lokasip_model->edit($data);
				helper_log("edit", "mengubah data lokasi pegawai");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('lokasip'),'refresh');
			}
			//end masuk data base
	}

}