<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getJumlahBarangKeluar($month=null, $year=null) {
		$this->db->select('SUM(jumlah) as total');
		if($month != null && $year != null) {
			$ym = $year.$month;
			$this->db->where("EXTRACT(YEAR_MONTH FROM tanggal_keluar) = $ym", null, false);
		}
		$this->db->where('approve', 'yes');
		$r = $this->db->get('barangkeluar')->row();
		return intval($r->total);
	}

	//listing barangkeluar
	public function listing()
	{
		$this->db->select('barangkeluar.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangkeluar');
		//join
			
					$this->db->join('stok','stok.id_stok	= barangkeluar.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		//$this->db->join('kondisi','kondisi.kondisi_barang	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$query = $this->db->get();
		return $query->result();
		}
public function listing4()
	{
		$this->db->select('stok.*,barang.*,lokasi.*,kondisi.*');
		$this->db->from('stok');
		//join
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');

		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
	}

public function lulu()
	{
		$this->db->select('barangkeluar.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangkeluar');
		//join
			$this->db->join('stok','stok.id_stok	= barangkeluar.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_keluar','DESC');
		$query = $this->db->get();
		return $query->result();
		}

	public function listing_approve()
	{
		$this->db->select('barangkeluar.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangkeluar');
		//join
					$this->db->join('stok','stok.id_stok	= barangkeluar.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$query = $this->db->get();
		return $query->result();
		}

	public function listing_lap()
	{
		$this->db->select('barangkeluar.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangkeluar');
		//join
		
					$this->db->join('stok','stok.id_stok	= barangkeluar.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		$this->db->where('approve', 'yes');
		//end join
		$query = $this->db->get();
		return $query->result();
		}
public function listing_lap1()
	{
		$this->db->select('laporan.*,barang.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('laporan');
		//join
		
					$this->db->join('stok','stok.id_stok	= laporan.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		
		//end join
		$query = $this->db->get();
		return $query->result();
		}
	//detail barangkeluar
	public function detail($id_keluar)
	{
		$this->db->select('*');
		$this->db->from('barangkeluar');
		$this->db->where('id_keluar',$id_keluar);
		$this->db->order_by('id_keluar');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		return $this->db->insert('barangkeluar',$data) ? true : false;
	}

		public function tambah1($data){
		return $this->db->insert('laporan',$data) ? true : false;
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_keluar',$data['id_keluar']);
		return $this->db->update('barangkeluar',$data) ? true : false;
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_keluar',$data['id_keluar']);
		$this->db->delete('barangkeluar',$data);
	}
		public function detail1($id_stok)
	{
		$this->db->select('*');
		$this->db->from('barangkeluar');
	$this->db->where('id_stok',$id_stok);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */