<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
//load database
 public $table = 'barang';
    public $id = 'id_barang';
	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->database();
		   
	}

	//listing barang
	public function listing()
	{
		$this->db->select('barang.*,jenis.jenis_barang,type.type_barang');
		$this->db->from('barang');
		//join
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		// $this->db->join('stok', 'stok.barcode = barang.barcode');
		// $this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_barang','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//detail barang
	public function detail($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang',$id_barang);
		$this->db->order_by('id_barang');
		$query = $this->db->get();
		return $query->row();
	}

public function detail1($barcode)
	{
		$this->db->select('*');
		$this->db->from('barang');
	$this->db->where('barcode',$barcode);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah/insert data
	public function tambah($data){
		$this->db->insert('barang',$data);
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->update('barang',$data);
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->delete('barang',$data);
	}

	public function updateStock ($barcode, $location, $amount, $action) {
		$this->db->where('barcode', $barcode);
		$this->db->where('lokasi', $location);
		$this->db->select('stok');
		$stok = $this->db->get('stok')->row();
		
		if($action === 'add') {
			$up = intval($amount) + intval($stok);	
		}

		if($action === 'min') {
			$up = intval($stok) - intval($amount);	
		}

		$this->db->where('barcode', $barcode);
		$this->db->where('lokasi', $location);
		return $this->db->update('stok', ['stok' => $up]) ? true : false;
		
	}
	//public function getById($id_barang) {
		//$this->db->where('id_barang', $id_barang);
		//return $this->db->get('barang')->row();
//	}
	   function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	//    function delete($id) {
      //  $this->db->where($this->id, $id);
        //$this->db->delete($this->table);
    //}
	}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */