<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing mutasi
	public function listing()
	{
		//$this->db->select('mutasi.*,barang.*,type.*,jenis.*,stok.*');
	//	$this->db->from('mutasi');
		//join
		
		//$this->db->join('stok','stok.id_stok = mutasi.id_stok');
		//$this->db->join('stok','stok.id_stok = mutasi.id_stok1');
		//$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		//$this->db->join('type','type.id_type	= barang.id_type');
$this->db->select('mutasi.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('mutasi');
		//join
			$this->db->join('stok','stok.id_stok	= mutasi.id_stok');
			
		$this->db->join('barang','barang.barcode	= stok.barcode');
	
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		
		$query = $this->db->get();
		return $query->result();

	
	}
	public function lap()
	{
		//$this->db->select('mutasi.*,barang.*,type.*,jenis.*,stok.*');
	//	$this->db->from('mutasi');
		//join
		
		//$this->db->join('stok','stok.id_stok = mutasi.id_stok');
		//$this->db->join('stok','stok.id_stok = mutasi.id_stok1');
		//$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		//$this->db->join('type','type.id_type	= barang.id_type');
$this->db->select('laporan.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('laporan');
		//join
			$this->db->join('stok','stok.id_stok	= laporan.id_stok');
			
		$this->db->join('barang','barang.barcode	= stok.barcode');
	
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		
		$query = $this->db->get();
		return $query->result();

	
	}
		public function listing_approve()
	{
$this->db->select('mutasi.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('mutasi');
		//join
			$this->db->join('stok','stok.id_stok	= mutasi.id_stok');
			
		$this->db->join('barang','barang.barcode	= stok.barcode');
	
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$query = $this->db->get();
		return $query->result();
		}
public function listing1()
	{
		$this->db->select('stok.*,barang.*,lokasi.*');
		$this->db->from('stok');
		//join
		$this->db->join('barang','barang.barcode	= stok.barcode');

		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function listing_lap()
	{
$this->db->select('mutasi.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('mutasi');
		//join
			$this->db->join('stok','stok.id_stok	= mutasi.id_stok');
			
		$this->db->join('barang','barang.barcode	= stok.barcode');
	
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');

		
		$query = $this->db->get();
		return $query->result();

	
	}




		// public function lokasi2()
	 // {
	 // 	$this->db->select('lokasi.*');
	 // 	$this->db->from('lokasi');
		
	 // 	$this->db->order_by('id_lokasi','DESC');
	 // 	//end join
	 // 	$query = $this->db->get();
	 // 	return $query->result();
	 // }

	//detail mutasi
	public function detail($id_mutasi)
	{
		$this->db->select('*');
		$this->db->from('mutasi');
		$this->db->where('id_mutasi',$id_mutasi);
		$this->db->order_by('id_mutasi');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data, $isReturnId=null){
		if($isReturnId !== null) {
			$this->db->insert('mutasi',$data);
			return $this->db->insert_id();	
		} else {
			return $this->db->insert('mutasi',$data) ? true : false;
		}
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_mutasi',$data['id_mutasi']);
		$this->db->update('mutasi',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_mutasi',$data['id_mutasi']);
		$this->db->delete('mutasi',$data);
	}
		public function detail1($id_stok)
	{
		$this->db->select('*');
		$this->db->from('mutasi');
	$this->db->where('id_stok',$id_stok);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */