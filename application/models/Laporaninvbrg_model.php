<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporaninvbrg_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
public function listing()
	{
	
	$this->db->select('stok.*,barang.*,lokasi.*,kondisi.*,type.*,jenis.*');
		$this->db->from('stok');
		//join
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('barang','barang.id_jenis	= jenis.id_jenis');
		$this->db->join('barang','barang.id_type	= type.id_type');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');

		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
		}
	

}