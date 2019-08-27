<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('pegawai_model');
			$this->load->model('lokasip_model');
			$this->load->model('user_model');
			
	}

	public function index()
	{	
		$pegawai 	= $this->pegawai_model->listing();
		$data 		= array ('title'		=> 'Data Pegawai ('.count ($pegawai).')',
							'pegawai'		=> $pegawai,
							 'isi'			=> 'pegawai/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function delete($id_pegawai){
			//proteksi delete
			
			$pegawai = $this->pegawai_model->detail($id_pegawai);
			$data = array (	'id_pegawai'	=> $pegawai->id_pegawai);
			$this->pegawai_model->delete($data);
			helper_log("delete", "menghapus data pegawai baru");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('pegawai'),'refresh');
			}

	public function tambah ()
	{

		$pegawai = $this->pegawai_model->listing();
		$lokasip = $this->lokasip_model->listing();
		$user = $this->user_model->listing();


		$valid = $this->form_validation;

		$valid->set_rules('id_pegawai','Id Pegawai','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama_pegawai','Nama Pegawai','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('no_hp','Telepon','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));

		$valid->set_rules('id_lokasip','Lokasi','required',
				array('required'	=> '%s harus diisi'));

	
		if ($valid->run()){
                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 8000;
                $config['max_width']            = 8000;
                $config['max_height']           = 8000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar')){
			//end validasi
			

		$data = array (		'title'				=>'Tambah Pegawai',
							
							'pegawai'			=> $pegawai,
							'lokasip'			=> $lokasip,
							'errors_upload'		=> $this->upload->display_errors(),
							'isi'				=>'pegawai/tambah',
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
			//manipulasi upload gambar
				$upload_data						= array('uploads' => $this->upload->data());
			//gambar asli disimpan di folder dan dicopy versi minimalnya
				$config['image_library']	 = 'gd2';
				$config['source_image']		 = './assets/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image']		 = './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
				$config['thumb_marker']		 = '';
				$config['create_thumb'] 	 = TRUE;
				$config['maintain_ratio']	 = TRUE;
				$config['width']         	 = 360;
				$config['height']       	 = 360;
				


				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				$i = $this->input;
				$data = array (	'id_pegawai'		=> $i->post('id_pegawai'),
							 	'nama_pegawai'		=> $i->post('nama_pegawai'),
							 	'gambar'			=> $upload_data['uploads']['file_name'],
							 	'alamat'			=> $i->post('alamat'),
							 	'no_hp'				=> $i->post('no_hp'),
							 	'email'				=> $i->post('email'),
							 	'id_lokasip'		=> $i->post('id_lokasip')
							 	

							 	
 						);
				$this->pegawai_model->tambah($data);
				helper_log("tambah", "menambahkan data pegawai baru");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('pegawai'),'refresh');
			}

		}
		$data = array (		'title'				=>'Tambah Pegawai',
							 
							'pegawai'			=> $pegawai,
							'lokasip'			=> $lokasip,
							'isi'				=>'pegawai/tambah',
		);
			$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit ($id_pegawai)
	{
		$pegawai = $this->pegawai_model->detail($id_pegawai);
		$lokasip = $this->lokasip_model->listing();
	

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_pegawai','id_pegawai','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama_pegawai','nama_pegawai','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('alamat','alamat','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('no_hp','no_hp','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));

		$valid->set_rules('id_lokasip','id_lokasip','required',
				array('required'	=> '%s harus diisi'));

		


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Pegawai : '.$pegawai->nama_pegawai,
							'pegawai'	=> $pegawai,
							'lokasip'	=> $lokasip,
							
							'isi'		=>'pegawai/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_pegawai'		=> $id_pegawai,
								'nama_pegawai'		=> $i->post('nama_pegawai'),
								'alamat'			=> $i->post('alamat'),
							 	'no_hp'				=> $i->post('no_hp'),
							 	'email'				=> $i->post('email'),
							 	'id_lokasip'		=> $i->post('id_lokasip'),
							 	
 						);
				$this->pegawai_model->edit($data);
				helper_log("edit", "mengubah data pegawai");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('pegawai'),'refresh');
			}
			//end masuk data base
			
	}

}