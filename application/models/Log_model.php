<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing log
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tabel_log');
		$this->db->order_by('log_id desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail log
	public function detail($log_id)
	{
		$this->db->select('*');
		$this->db->from('tabel_log');
		$this->db->where('log_id',$log_id);
		$this->db->order_by('log_id');
		$query = $this->db->get();
		return $query->row();
	}
}

	//tambah/insert data
	

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */