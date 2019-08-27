<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lokasip_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing lokasip
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('lokasip');
		$this->db->order_by('id_lokasip');
		$query = $this->db->get();
		return $query->result();
	}

	//detail lokasip
	public function detail($id_lokasip)
	{
		$this->db->select('*');
		$this->db->from('lokasip');
		$this->db->where('id_lokasip',$id_lokasip);
		$this->db->order_by('id_lokasip');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('lokasip',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_lokasip',$data['id_lokasip']);
		$this->db->update('lokasip',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_lokasip',$data['id_lokasip']);
		$this->db->delete('lokasip',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */