<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('user_model');
	}

	public function index()
	{	
		$user 	= $this->user_model->listing();
		$data 		= array ('title'		=>'Data User Administrator ('.count ($user).')',
							'user'		=> $user,
							 'isi'		=> 'user/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	

	public function tambah ()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_user','ID User','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama','Nama User','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));

		$valid->set_rules('username','Username','required|trim|min_length[6]|max_length[32]|is_unique[user.username]',
				array('required'	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter',
					  'max_length'	=> '%s maksimal 32 karakter',
					  'is_unique'	=> '%s <strong>'.$this->input->post('username').'</strong> sudah digunakan, buat username baru!'));

		$valid->set_rules('akses_level','Akses Level','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('password','password','required|trim|min_length[6]',
				array('required'	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter'));

		

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah User',
							'isi'		=>'user/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_user'			=> $i->post('id_user'),
								'nama'		=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'username'		=> $i->post('username'),
							 	'password'		=> md5($i->post('password')),
							 	'akses_level'	=> $i->post('akses_level')
							 	
							 	
 						);
				$this->user_model->tambah($data);
				helper_log("tambah", "menambahkan data user");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('user'),'refresh');
			}
	}

	//Edit
	public function edit ($id_user)
	{
		$user = $this->user_model->detail($id_user);

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('nama','Nama','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));

		$valid->set_rules('password','password','required|trim|min_length[6]',
				array('required'	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit User Administrator : '.$user->nama,
							'user'		=> $user,
							'isi'		=>'user/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_user'		=> $id_user,
								'nama'	=> $i->post('nama'),
								'email'			=> $i->post('email'),
							 	'username'		=> $i->post('username'),
							 	'password'		=> md5($i->post('password')),
							 	'akses_level'	=> $i->post('akses_level')
 						);
				$this->user_model->edit($data);
				helper_log("edit", "mengubah data user");
				$this->session->set_flashdata('sukses', 'data telah diupdate');
				redirect(base_url('user'),'refresh');
			}
			//end masuk data base
	}

			//delete
		public function delete($id_user){
			//proteksi delete
			$this->check_login->check();
			
			$user = $this->user_model->detail($id_user);
			$data = array(	'id_user'	=> $user->id_user);
			$this->user_model->delete($data);
			helper_log("delete", "menghapus data user");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('user'),'refresh');
			}
	
			
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */