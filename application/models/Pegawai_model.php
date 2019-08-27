<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing pegawai
	public function listing()
	{

		$this->db->select('pegawai.*,lokasip.*');
		$this->db->from('pegawai');

		$this->db->join('lokasip','lokasip.id_lokasip = pegawai.id_lokasip','LEFT');
		

		$this->db->order_by('id_pegawai','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function lokasip()
	{
		$this->db->select('lokasip.*');
		$this->db->from('lokasip');
		
		$this->db->order_by('id_lokasip','DESC');
		//end join
		$query = $this->db->get();
		return $query->result();
		}

	//detail pegawai
	public function detail($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->order_by('id_pegawai');
		$query = $this->db->get();
		return $query->row();
	}

	


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('pegawai',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_pegawai',$data['id_pegawai']);
		$this->db->update('pegawai',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_pegawai',$data['id_pegawai']);
		$this->db->delete('pegawai',$data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */