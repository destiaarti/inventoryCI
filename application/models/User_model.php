<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->result();
	}

	//detail user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//login user
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'		=> $username,
							   'password'		=> md5($password)));
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah/insert data
	public function tambah($data){
		$this->db->insert('user',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('user',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */