<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('stok_model');
			$this->load->model('barang_model');
			$this->load->model('lokasi_model');
			$this->load->model('kondisi_model');
			$this->load->model('user_model');
			$this->load->model('laporan_model');
	}

	public function index()
	{	
		$stok 	= $this->stok_model->listing();
		$stok1 	= $this->stok_model->begitulah();
		$stok2 	= $this->stok_model->begitulah1();
		$lap 	= $this->laporan_model->wewew();
		//  $data['stok2'] = $this->stok_model->begitulah();
		       
		
		//	foreach ($stok as $key => $value) {
		//	$value->lokasi_barang = $this->lokasi_model->getNamaLokasiJoinWhere($value->lokasi_barang, 'stok', 'lokasi');
		//	$value->pengirim = $this->lokasi_model->getNamaLokasiJoinWhere($value->lokasi_pengirim, 'mutasi', 'lokasi_pengirim');
			// $value->pengirim = 
			// $value->pengirim = 
	//	}

		$data 		= array ('title'	=> 'Halaman Dashboard Administator',

							'stok'		=> $stok,
							'stok1'		=> $stok1,
							'stok2'		=> $stok2,
							'lap'		=> $lap,
							 'isi'		=> 'stok/list'		
						);
					//	$data['stok2'] = $this->db->get('stok')->num_rows();
					//	$data['lokasip'] = $this->db->get_where('lokasi', array('id_lokasi' => $stok->lokasi))->row_array();
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	// public function delete($id_stok){
	// 		//proteksi delete
			
	// 		$stok = $this->stok_model->detail($id_stok);
	// 		$data = array(	'id_stok'	=> $stok->id_stok);
	// 		$this->stok_model->delete($data);
	// 		helper_log("delete", "menghapus data stok barang");
	// 		$this->session->set_flashdata('sukses', 'data telah dihapus');
	// 		redirect(base_url('stok'),'refresh');
	// 		}

	 public function tambah ()
	 {
		 		$barang = $this->barang_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$kondisi = $this->kondisi_model->listing();
	 	//validasi
	 	$valid = $this->form_validation;

	 	$valid->set_rules('id_stok','id_stok','required',
	 			array('required'	=> '%s harus diisi'));
	
	 	$valid->set_rules('stok','stok','required',
	 			array('required'	=> '%s harus diisi'));
				$valid->set_rules('kondisi','kondisi','required',
	 			array('required'	=> '%s harus diisi'));
	


	 	if ($valid->run() === FALSE){
	 		//end validasi
			

	 	$data = array (		'title'		=>'Tambah Stok',
			'barang'	=> $barang,
							'lokasi'	=> $lokasi,
							'kondisi'	=> $kondisi,
	 						'isi'		=>'stok/tambah'
	 	);
	 		$this->load->view('layout/wrapper', $data, FALSE);
	 		//masukan database
	 	}else{
	 			$i = $this->input;
				$barcode=$this->input->post('barcode', TRUE);
				$lokasi=$this->input->post('lokasi', TRUE);
				$kondisi=$this->input->post('kondisi', TRUE);
	 			$data = array (	'id_stok'			=> $i->post('id_stok'),
	 						 	'stok'		=> $i->post('stok'),
	 						 	'barcode'		=> $i->post('barcode'),
	 						 	'lokasi'		=> $i->post('lokasi'),
	 						 	'kondisi'		=> $i->post('kondisi'),
	 						 
							 	
  						);
				//$check = $this->CI->db->get_where('stok', array('barcode' => $barcode, 'lokasi' => $lokasi), 1);
				 //if ($check->num_rows() > 0) {
 $this->db->select('id_stok');
    $this->db->from('stok');
    $this->db->where('barcode', $barcode);
    $this->db->where('lokasi', $lokasi);
    $this->db->where('kondisi', $kondisi);
    $query = $this->db->get();
    $num = $query->num_rows();
    if ($num > 0) {			
	$lokasi = $this->lokasi_model->listing();	
	$kondisi = $this->kondisi_model->listing();	
					echo $this->session->set_flashdata('notif', ' stok sudah ada!');
					$data = array (		'title'		=>'Tambah Stok',
			'barang'	=> $barang,
							'lokasi'	=> $lokasi,
							'kondisi'	=> $kondisi,
	 						'isi'		=>'stok/tambah'
	 	);
	 		$this->load->view('layout/wrapper', $data);
					  }
					  else{
 			$this->stok_model->tambah($data);
 			helper_log("tambah", "menambahkan data stok barang");
 			$this->session->set_flashdata('sukses', 'data telah ditambah');
					  redirect(base_url('stok'),'refresh');}
 		}
}


	// //Edit
	public function edit ($id_stok)
	{
	 	$stok = $this->stok_model->detail($id_stok);
	$barang = $this->barang_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$kondisi = $this->kondisi_model->listing();
	// 	//validasi
	 	$valid = $this->form_validation;


	 	$valid->set_rules('id_stok','id_stok','required',
	 			array('required'	=> '%s harus diisi'));

	 	$valid->set_rules('stok','stok','required',
	 			array('required'	=> '%s harus diisi'));


	 	if ($valid->run() === FALSE){
	 		//end validasi
			

	 	$data = array (		'title'		=>'Edit Stok : '.$stok->id_stok,
	 						'stok'		=> $stok,
	 						'kondisi'		=> $kondisi,
	 						'lokasi'		=> $lokasi,
	 						'isi'		=>'stok/edit'
	 	);
	 		$this->load->view('layout/wrapper', $data, FALSE);
	// 		//masukan database
	 	}else{
	 			$i = $this->input;
	 			$data = array (	'id_stok'		=> $id_stok,
	 						
	 							'stok'		=> $i->post('stok'),
  						);
	 			$this->stok_model->edit($data);
	 			helper_log("edit", "mengubah data stok barang");
	 			$this->session->set_flashdata('sukses', 'data telah diupdate');
	 			redirect(base_url('stok'),'refresh');
	 		}
			//end masuk data base
	}

}