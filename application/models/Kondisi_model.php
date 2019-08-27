<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing kondisi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kondisi');
		$this->db->order_by('id_kondisi');
		$query = $this->db->get();
		return $query->result();
	
		}

	//detail kondisi
	public function detail($id_kondisi)
	{
		$this->db->select('*');
		$this->db->from('kondisi');
		$this->db->where('id_kondisi',$id_kondisi);
		$this->db->order_by('id_kondisi');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('kondisi',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_kondisi',$data['id_kondisi']);
		$this->db->update('kondisi',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_kondisi',$data['id_kondisi']);
		$this->db->delete('kondisi',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */