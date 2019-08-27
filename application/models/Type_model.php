<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class type_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing type
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('type');
		$this->db->order_by('id_type');
		$query = $this->db->get();
		return $query->result();
	}

	//detail type
	public function detail($id_type)
	{
		$this->db->select('*');
		$this->db->from('type');
		$this->db->where('id_type',$id_type);
		$this->db->order_by('id_type');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('type',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_type',$data['id_type']);
		$this->db->update('type',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_type',$data['id_type']);
		$this->db->delete('type',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */