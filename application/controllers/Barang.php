<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('barangmasuk_model');
			$this->load->model('barangkeluar_model');
			$this->load->model('mutasi_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('lokasi_model');
			$this->load->model('user_model');
			$this->load->model('stok_model');
	}

	public function index()
	{	   if ($this->session->userdata('akses_level') == "Pimpinan") { 
		  return show_error('Harus Login sebagai admin/user untuk mengakses halaman ini');
	}	else{
		$barang 	= $this->barang_model->listing();
		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							'barang'		=> $barang,

							 'isi'		=> 'barang/list'		
						);
	$this->load->view('layout/wrapper', $data, FALSE);}
	}	

	public function approve_barang()
	{	
		$approvelist= $this->barang_model->listing_approve();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'approvelist'		=> $approvelist,
							 'isi'				=> 'approve/barang'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function approve_barang_setujui()
	{	
		$id= $this->uri->segment(4);
		$i = $this->input;
		$data = array ( 'id_barang' => $id,
						'approve'  => "yes");
				// var_dump($data);
				// die();
				
				$update = $this->barang_model->edit($data);
				
				if($update) {
					$k = $this->barang_model->detail($id);
					$this->barang_model->updateStock($k->barcode, $k->id_lokasi, $k->jumlah, 'min');
				}
				$this->session->set_flashdata('sukses', 'Data telah diupdate.');
				
				redirect(base_url('approve/barang'),'refresh');

	// public function stok()
	// {	
	// 	$stok 	= $this->stok_model->listing();
	// 	$data 		= array ('title'	=> 'Halaman Dashboard Administator',
	// 						'stok'		=> $stok,
							
	// 						 'isi'		=> 'stok/list'		
	// 					);
	// 	$this->load->view('layout/wrapper', $data, FALSE);
	 }	

	public function delete($id_barang){
			//proteksi delete
			
			$barang = $this->barang_model->detail($id_barang);
			//$data = $this->barang_model->getbyId($id_barang);
		
			    //   $row = $this->barang_model->get_by_id($id_barang);
		$barcode=$barang->barcode;
				$stok = $this->stok_model->detail2($barcode);
			
				$id_stok=$stok->id_stok;
			//$data = $this->barang_model->getbyId($id_barang);

			// if ($row) {
            //$this->barang_model->delete($id_barang);
			$barangmasuk = $this->barangmasuk_model->detail1($id_stok);
			//$id_masuk=$barangmasuk->id_masuk;
		//	$barangkeluar = $this->barangkeluar_model->detail1($id_stok);
			//$id_keluar=$barangkeluar->id_keluar;
			//$mutasi = $this->mutasi_model->detail1($id_stok);
			//$id_mutasi=$mutasi->id_mutasi;
				//	$data4 = array(	'id_mutasi'	=> $mutasi->id_mutasi);
					//		$this->mutasi_model->delete($data4);
						//		$data3 = array(	'id_keluar'	=> $barangkeluar->id_keluar);
							//		$this->barangkeluar_model->delete($data3);
				//	$data2 = array(	'id_stok'	=> $barangmasuk->id_stok);
	//$this->barangmasuk_model->delete1($data2);	
//$data1 = array(	'barcode'	=> $stok->barcode);	
	//	$this->stok_model->delete($data1);
			//$data = $this->barang_model->getbyId($id_barang);
				$data = array(	'id_barang'	=> $barang->id_barang);
			
				$this->barang_model->delete($data);
		
			helper_log("delete", "menghapus data barang");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('barang'),'refresh');
	//}
	}

	public function tambah ()
	{
		$jenis = $this->jenis_model->listing();
		$type = $this->type_model->listing();
		$lokasi = $this->lokasi_model->listing();
		
		$valid = $this->form_validation;

		$valid->set_rules('id_barang','id_barang','required',
				array('required'	=> '%s harus diisi'));

			$valid->set_rules('barcode','Barcode','required|is_unique[barang.barcode]',
				array('required'	=> '%s harus diisi',
					  'is_unique'	=> '%s <strong>'.$this->input->post('barcode').'</strong> sudah digunakan, buat baru!'));

	

	$valid->set_rules('nama_barang','Nama Barang','required|is_unique[barang.nama_barang]',
				array('required'	=> '%s harus diisi',
					  'is_unique'	=> '%s <strong>'.$this->input->post('nama_barang').'</strong> sudah digunakan, buat baru!'));


		$valid->set_rules('id_jenis','id_jenis','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('id_type','id_type','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
				array('required'	=> '%s harus diisi'));

	
				

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Barang',
							'jenis'		=> $jenis,
							'type'		=> $type,
							'lokasi'	=> $lokasi,
							'isi'		=>'barang/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				
				$data = array (	'id_barang'			=> $i->post('id_barang'),
								'id_jenis'			=> $i->post('id_jenis'),
								'id_type'			=> $i->post('id_type'),
							
							 	'nama_barang'		=> $i->post('nama_barang'),
							 	'barcode'			=> $i->post('barcode'),
							 	'keterangan'				=> $i->post('keterangan')
							 	
 						);
				$this->barang_model->tambah($data);
				
				helper_log("tambah", "menambahkan data barang");
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('barang'),'refresh');
			}

		
	}

	//Edit
	public function edit ($id_barang)
	{
		$barang = $this->barang_model->detail($id_barang);
		$jenis = $this->jenis_model->listing();
		$type = $this->type_model->listing();
		$lokasi = $this->lokasi_model->listing();

		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('id_barang','id_barang','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('barcode','Barcode','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('nama_barang','Nama Barang','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('id_jenis','Jenis','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('id_type','Tipe','required',
				array('required'	=> '%s harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
				array('required'	=> '%s harus diisi'));

		// $valid->set_rules('harga','Harga','required',
		// 		array('required'	=> '%s harus diisi'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Barang : '.$barang->nama_barang,
							'barang'	=> $barang,
							'jenis'		=> $jenis,
							'type'		=> $type,
							'lokasi'	=> $lokasi,
							'isi'		=>'barang/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_barang'			=> $i->post('id_barang'),
								'id_jenis'			=> $i->post('id_jenis'),
								'id_type'			=> $i->post('id_type'),
								// 'harga'			=> $i->post('harga'),
							 	'nama_barang'		=> $i->post('nama_barang'),
							 	'barcode'			=> $i->post('barcode'),
							 	'keterangan'				=> $i->post('keterangan')
							 	// 'tahun'				=> $i->post('tahun')
							 	
							 	
 						);
				$this->barang_model->edit($data);
				helper_log("edit", "mengubah data barang");
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('barang'),'refresh');
			}
			//end masuk data base
	}

}