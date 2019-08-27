<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('barangmasuk_model');
			$this->load->model('barangkeluar_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('lokasi_model');
			$this->load->model('user_model');
			$this->load->model('kondisi_model');
			$this->load->model('stok_model');
	}

	public function index()
	{	
		$barangmasuk 	= $this->barangmasuk_model->listing();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'barangmasuk'		=> $barangmasuk,
							 'isi'				=> 'barangmasuk/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	

	// public function laporanmasuk()
	// {	
	// 	$laporanmsk 	= $this->barangmasuk_model->listing_lap();
	// 	$data 		= array ('title'			=> 'Halaman Dashboard Administator',
	// 						'laporanmsk'		=> $laporanmsk,
	// 						 'isi'				=> 'laporanmasuk/list'		
	// 					);
	// 	$this->load->view('layout/wrapper', $data, FALSE);
	// }	

	public function laporaninvbrg()
	{	
		$laporaninv 	= $this->barangmasuk_model->listing_lap();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'laporaninv'		=> $laporaninv,
							 'isi'				=> 'laporaninvbrg/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	

	public function approve_masuk()
	{	
		$approvelist= $this->barangmasuk_model->listing_approve();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'approvelist'		=> $approvelist,
							 'isi'				=> 'approve/masuk'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	


	public function approve_masuk_setujui()
	{	
		$id= $this->uri->segment(4);
		
		$i = $this->input;
					$m = $this->barangmasuk_model->detail($id);
				
				
			//	if($update) {
				//	$m = $this->barangmasuk_model->detail($id);
					//$this->barang_model->updateStock($m->barcode, $m->id_lokasi , $m->jumlah, 'add');
			//	}
				//$m = $this->barangmasuk_model->detail($id);
			$id_stok=$m->id_stok;
				//$qty = $this->stok_model->get_product($barcode);
		
		
				//$qty = $this->stok_model->get_product($barcode);
		
				
					$n = $this->stok_model->detail1($id_stok);
					$y=$m->jumlah;
				
					$x=$n->stok;
								
					$barcode=$n->barcode;
					$barang4=$this->barang_model->detail1($barcode);
					
					$id_jenis=$barang4->id_jenis;
					$id_type=$barang4->id_type;
					$jenis1=$this->jenis_model->detail($id_jenis);
					$jenis=$jenis1->jenis_barang;
					$type1=$this->type_model->detail($id_type);
							$type=$type1->type_barang;
					$id_lokasi=$n->lokasi;
					$kondisi=$n->kondisi;
					$s1=$this->lokasi_model->detail($id_lokasi);
					$l=$s1->lokasi_barang;
					$s2=$this->kondisi_model->detail($kondisi);
					$l1=$s2->kondisi_barang;
						$b1 = $this->barang_model->detail1($barcode);
					$b2=$b1->barcode;
					$b4=$b1->nama_barang;
					//		 $sisa = $qty['stok'] ;
					$c= $x+$y;
					$data = array ( 'id_masuk' => $id,
				
						'approve'  => "yes");
		

				// var_dump($m);
				// die();
				$update = $this->barangmasuk_model->edit($data);
				$data1 = array ( 
			
				'id_stok' =>$id_stok,
				'stok' => $c,
				);
				  $this->stok_model->edit($data1);
		

		
		$j=$m->jumlah;
		$t=$m->tanggal_masuk;
	
 	$data2 = array (	
								'id_transaksi'	=> $id,
								'tanggal'			=> $t,
								'status'			=> $l1,
							 	'jml'			=> $j,
								'barcode' 			=> $barcode,
								'lokasi' 			=> $l,
								'lokasi1' 			=> 0,
								'nama' 			=> $b4,
								'jenis_barang' 			=> $jenis,
								'type_barang' 			=> $type,
								'jenis'			=> "masuk"
								
								
							 	
 						);

				$this->barangkeluar_model->tambah1($data2);		
		$this->session->set_flashdata('sukses', 'Data telah diupdate.');
				
				redirect(base_url('approve/masuk'),'refresh');
	}	
	
	public function delete($id_masuk){
			//proteksi delete
			
			$barangmasuk = $this->barangmasuk_model->detail($id_masuk);
			$data = array(	'id_masuk'	=> $barangmasuk->id_masuk);
			$this->barangmasuk_model->delete($data);
			helper_log("delete", "menghapus data transaksi barang masuk");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('barangmasuk'),'refresh');
			}

	public function tambah ()
	{
		$barang = $this->barang_model->listing();
		$kondisi = $this->barangmasuk_model->kondisi();
		$barangmasuk = $this->barangmasuk_model->listing();
		$barangmasuk1 = $this->barangmasuk_model->listing4();
		$lokasi = $this->lokasi_model->listing();
		$stok = $this->stok_model->listing();
		$valid = $this->form_validation;


		
		$valid->set_rules('jumlah','jumlah','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('id_stok','barcode, lokasi dan kondisi','required',
				array('required'	=> '%s harus diisi'));
	

		

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Barang',
							'barang'		=> $barang,
							'barangmasuk'		=> $barangmasuk,
							'barangmasuk1'		=> $barangmasuk1,
							'kondisi'		=> $kondisi,
							'lokasi'	=>$lokasi,
							'stok'	=>$stok,
							'isi'		=>'barangmasuk/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_masuk'			=> $i->post('id_masuk'),
								'tanggal_masuk'		=> $i->post('tanggal_masuk'),
								'id_stok'			=> $i->post('id_stok'),
							
							 	
							 	'jumlah'			=> $i->post('jumlah'),
							 	
							 
							 	'approve'			=> "no"
							 	
 						);
				$this->barangmasuk_model->tambah($data);
			
				helper_log("tambah", "menambahkan data transaksi barang masuk");
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('barangmasuk'),'refresh');
			}

		
	}

	//Edit
	public function edit ($id_masuk)
	{

		$barangmasuk = $this->barangmasuk_model->detail($id_masuk);
		$barangmasuk1 = $this->barangmasuk_model->listing4();
		$barang = $this->barang_model->listing();
		$kondisi = $this->barangmasuk_model->kondisi();
		$lokasi = $this->lokasi_model->listing();
		$stok = $this->stok_model->listing();

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_masuk','id_masuk','required',
				array('required'	=> '%s harus diisi'));

	
		$valid->set_rules('id_stok','barcode, lokasi dan kondisi','required',
				array('required'	=> '%s harus diisi'));

	
		$valid->set_rules('jumlah','jumlah','required',
				array('required'	=> '%s harus diisi'));


		// $valid->set_rules('harga','harga','required',
		// 		array('required'	=> '%s harus diisi'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Barang : '.$barangmasuk->id_masuk,
						
							'barang'		=> $barang,
							'barangmasuk'		=> $barangmasuk,
							'barangmasuk1'		=> $barangmasuk1,
							'kondisi'		=> $kondisi,
							'lokasi'	=>$lokasi,
							'stok'	=>$stok,
							'isi'		=>'barangmasuk/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_masuk'			=> $i->post('id_masuk'),
								'tanggal_masuk'		=> $i->post('tanggal_masuk'),
								'id_stok'			=> $i->post('id_stok'),
								
							 	'jumlah'			=> $i->post('jumlah'),
							
							 
							 	
 						);
				$this->barangmasuk_model->edit($data);
				helper_log("edit", "mengubah data transaksi barang masuk");
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('barangmasuk'),'refresh');
			}
			//end masuk data base
	}

}