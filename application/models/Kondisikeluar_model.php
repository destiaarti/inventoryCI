<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisikeluar_model extends CI_Model {
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
		$this->db->from('kondisikeluar');
		$this->db->order_by('id_kondisi_keluar');
		$query = $this->db->get();
		return $query->result();
	
		}

	//detail kondisi
	public function detail($id_kondisi_keluar)
	{
		$this->db->select('*');
		$this->db->from('kondisikeluar');
		$this->db->where('id_kondisi_keluar',$id_kondisi_keluar);
		$this->db->order_by('id_kondisi_keluar');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('kondisikeluar',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_kondisi_keluar',$data['id_kondisi_keluar']);
		$this->db->update('kondisikeluar',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_kondisi_keluar',$data['id_kondisi_keluar']);
		$this->db->delete('kondisikeluar',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */