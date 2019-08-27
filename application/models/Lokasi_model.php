<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing lokasi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->order_by('id_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	//detail lokasi
	public function detail($id_lokasi)
	{
		$this->db->select('*');
		$this->db->from('lokasi');
		$this->db->where('id_lokasi',$id_lokasi);
		$this->db->order_by('id_lokasi');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		$this->db->insert('lokasi',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_lokasi',$data['id_lokasi']);
		$this->db->update('lokasi',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_lokasi',$data['id_lokasi']);
		$this->db->delete('lokasi',$data);
	}

	public function getlokasi($id, $table, $field, $index=null) {
		if($index !== null) {
			$on = "lokasi.".$index." = ".$table.".".$field;
			$where = [
				"lokasi.$index" => $id, 
			];
			$this->db->where($where);
		} else {
			$on = "lokasi.id_lokasi = ".$table.".".$field;
			$this->db->where('lokasi.id_lokasi', $id);
		}
		$this->db->select('lokasi_barang'); 
		$this->db->join($table, $on);
		
		return $this->db->get('lokasi')->row()->lokasi_barang;
	}

	public function getLokasiPengirim($barcode) {
		$this->db->select('lokasi_barang');
		$this->db->join('stok', 'lokasi.id_lokasi = stok.lokasi');
		$this->db->join('barang', 'lokasi.id_lokasi = stok.lokasi');
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */