<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->model('user_model');
			$this->load->helper('url');
		
	}

	//update profile
	public function index()
	{
		$id_user	= $this->session->userdata('id_user');
		$user		= $this->user_model->detail($id_user);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'));

		$valid->set_rules('password','Password','required|trim|min_length[6]',
				array('required'	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Update Profile : '.$user->nama,
							'user'		=> $user,
							
							'isi'		=>'profile/list'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
							 	'email'			=> $i->post('email'),
							 	'username'		=> $i->post('username'),
							 	'password'		=> md5($i->post('password')),
							 	'akses_level'	=> $i->post('akses_level')
 						);
				$this->user_model->edit($data);
				helper_log("update", "update data profile");
				$this->session->set_flashdata('sukses', 'Profile telah diupdate');
				redirect(base_url('profile'),'refresh');
			}
			//end masuk data base
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */