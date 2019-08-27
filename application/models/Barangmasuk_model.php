<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getJumlahBarangMasuk($month=null, $year=null) {
		$this->db->select('SUM(jumlah) as total');
		if($month != null && $year != null) {
			$ym = $year.$month;
			$this->db->where("EXTRACT(YEAR_MONTH FROM tanggal_masuk) = $ym", null, false);
		}
		$this->db->where('approve', 'yes');
		$r = $this->db->get('barangmasuk')->row();
		return intval($r->total);
	}
   function get_stok(){
        $query = $this->db->query("SELECT tanggal_masuk,SUM(jumlah) AS jumlah FROM barangmasuk GROUP BY tanggal_masuk");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	//listing barangmasuk
	public function listing()
	{
		$this->db->select('barangmasuk.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangmasuk');
		//join
			$this->db->join('stok','stok.id_stok	= barangmasuk.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->result();
		}

	public function listing_masuk()
	{
		$this->db->select('barangmasuk.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangmasuk');
		//join
			$this->db->join('stok','stok.id_stok	= barangmasuk.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->result();
		

		}
		public function listing4()
	{
		$this->db->select('barangmasuk.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangmasuk');
		//join
			$this->db->join('stok','stok.id_stok	= barangmasuk.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->result();
	}


	public function listing_approve()
	{
	$this->db->select('barangmasuk.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangmasuk');
		//join
			$this->db->join('stok','stok.id_stok	= barangmasuk.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->result();
		}

	public function listing_lap()
	{
		$this->db->select('barangmasuk.*,barang.*,kondisi.*,jenis.*,type.*,lokasi.*,stok.*');
		$this->db->from('barangmasuk');
		//join
			$this->db->join('stok','stok.id_stok	= barangmasuk.id_stok');
		$this->db->join('barang','barang.barcode	= stok.barcode');
		$this->db->join('kondisi','kondisi.id_kondisi	= stok.kondisi');
		$this->db->join('jenis','jenis.id_jenis	= barang.id_jenis');
		$this->db->join('type','type.id_type	= barang.id_type');
		$this->db->join('lokasi','lokasi.id_lokasi	= stok.lokasi');
		//end join
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->result();
		}

	public function kondisi()
	{
		$this->db->select('kondisi.*');
		$this->db->from('kondisi');
		
		$this->db->order_by('id_kondisi','DESC');
		//end join
		$query = $this->db->get();
		return $query->result();
		}

	//detail barangmasuk
	public function detail($id_masuk)
	{
		$this->db->select('*');
		$this->db->from('barangmasuk');
		$this->db->where('id_masuk',$id_masuk);
		$this->db->order_by('id_masuk','DESC');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah/insert data
	public function tambah($data){
		return $this->db->insert('barangmasuk',$data) ? true : false;
	}

	//edit/update data
	public function edit($data){
		$this->db->where('id_masuk',$data['id_masuk']);
		return $this->db->update('barangmasuk',$data) ? true : false;
	}

	//hapus/delete data
	public function delete($data){
		$this->db->where('id_masuk',$data['id_masuk']);
		$this->db->delete('barangmasuk',$data);
	}
	public function delete1($data){
		$this->db->where('id_stok',$data['id_stok']);
		$this->db->delete('barangmasuk',$data);
	}
		public function detail1($id_stok)
	{
		$this->db->select('*');
		$this->db->from('barangmasuk');
	$this->db->where('id_stok',$id_stok);

		//$this->db->order_by('id_stok');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */