<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing stok
	public function listing()
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
	public function listing1()
	{
		$this->db->select('stok.*,barang.*,lokasi.*,mutasi.*');
		$this->db->from('stok');
		//join
				$this->db->join('mutasi','mutasi.id_stok	= stok.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');


		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function listing2()
	{
			$this->db->select('stok.*,barang.*,lokasi.*,mutasi.*');
		$this->db->from('stok');
		//join
				$this->db->join('mutasi','mutasi.id_stok1	= stok.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');

		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function namastok($id, $table, $field, $index=null) {
		if($index !== null) {
			$on = "stok.".$index." = ".$table.".".$field;
			$where = [
				"stok.$index" => $id, 
			];
			$this->db->where($where);
		} else {
			$on = "stok.id_stok = ".$table.".".$field;
			$this->db->where('stok.id_stok', $id);
		}
		$this->db->select('lokasi'); 
		$this->db->join($table, $on);
		
		return $this->db->get('stok')->row()->lokasi;
	}
	public function getf($lokasi) {
		$this->db->select('lokasi_barang'); 
		$this->db->from('stok');
	$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
	
		$query = $this->db->get();
return $this->db->get('lokasi')->row()->lokasi_barang;
	}
	public function begitulah(){
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
	$this->db->select('lokasi.lokasi_barang,stok.lokasi,SUM(stok.stok) as total');
	$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
	$this->db->group_by('lokasi');
	$query=$this->db->get('stok');
	if($query->num_rows()>0){
		return $query->result();
	}
	}
		public function begitulah1(){
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
	$this->db->select('kondisi.kondisi_barang,stok.lokasi,SUM(stok.stok) as total1');
	$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
	$this->db->group_by('kondisi');
	$query=$this->db->get('stok');
	if($query->num_rows()>0){
		return $query->result();
	}
	}
public function lokasi()
	{
		$this->db->select('lokasi.*');
		$this->db->select('lokasi_barang');
		$this->db->from('lokasi');
		
		$this->db->order_by('id_lokasi','DESC');
		//end join
		$query = $this->db->get();
		return $query->result();
	}
	//detail stok
	public function detail($id_stok)
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->where('id_stok',$id_stok);
	//	$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
	    public function  get_product($id){
      $query = $this->db->query("SELECT * FROM stok WHERE id_stok = '$id'");
      return $query->row_array();
    }
	public function detail1($id_stok)
	{
		$this->db->select('*');
		$this->db->from('stok');
	$this->db->where('id_stok',$id_stok);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
	public function detail2($barcode)
	{
		$this->db->select('*');
		$this->db->from('stok');
	$this->db->where('barcode',$barcode);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
	//tambah/insert data
	 public function tambah($data){
	 	$this->db->insert('stok',$data);
	 }

	// //edit/update data
	 public function edit($data){
	$this->db->where('id_stok',$data['id_stok']);
		$this->db->update('stok',$data);
	}

	// //hapus/delete data
	public function delete($data){
	 	$this->db->where('id_stok',$data['id_stok']);
	 	$this->db->delete('stok',$data);
	 }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */