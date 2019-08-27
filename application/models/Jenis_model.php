<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing jenis
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->order_by('id_jenis');
		$query = $this->db->get();
		return $query->result();
	}

	//detail jenis
	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->where('id_jenis',$id_jenis);
		$this->db->order_by('id_jenis');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('jenis',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_jenis',$data['id_jenis']);
		$this->db->update('jenis',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_jenis',$data['id_jenis']);
		$this->db->delete('jenis',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */