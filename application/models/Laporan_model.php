<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function detail($id_laporan)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->where('id_laporan',$id_laporan);
		$this->db->order_by('id_laporan');
		$query = $this->db->get();
		return $query->row();
	}
			public function lap()
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->order_by('id_laporan');
		$query = $this->db->get();
		return $query->result();
	}
		public function wewew(){
	//	$hsl=$this->db->query("SELECT stok.id_stok,stok.lokasi,lokasi,lokasi.id_lokasi,lokasi_barang,stok.stok, //COUNT(stok.lokasi) FROM stok JOIN lokasi ON lokasi.id_lokasi = stok.lokasi GROUP BY lokasi");
	//	return $hsl->result();
	
	//$this->db->select('stok.lokasi,count(stok.lokasi) as total');
	//$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
	//$this->db->group_by('lokasi');
	//$query=$this->db->get('stok');
	//if($query->num_rows()>0){
		//return $query->result();
	//}
	//}
	//$this->db->select('laporan.id_transaksi,laporan.lokasi,laporan.status,laporan.jenis,laporan.jml,laporan.barcode,laporan.lokasi1,laporan.tanggal');
	$this->db->select('*');
//	$this->db->group_by('barcode');
	$query=$this->db->get('laporan');
	
		return $query->result();
	
	}
	}
	