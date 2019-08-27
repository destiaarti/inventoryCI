<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('barang_model');
			$this->load->model('barangkeluar_model');
			$this->load->model('jenis_model');
			$this->load->model('kondisi_model');
			$this->load->model('type_model');
			$this->load->model('user_model');
			$this->load->model('lokasi_model');
			$this->load->model('stok_model');
				$this->load->model('barangmasuk_model');

			
	}

	public function index()
	{	
		$barangkeluar 	= $this->barangkeluar_model->lulu();
	
					
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'barangkeluar'		=> $barangkeluar,
					
							 'isi'				=> 'barangkeluar/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function laporankeluar()
	{	
		$lapkeluar1 	= $this->barangkeluar_model->listing_lap1();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'lapkeluar1'		=> $lapkeluar1,
							 'isi'				=> 'laporankeluar/list'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function approve_keluar()
	{	
		$approvelist= $this->barangkeluar_model->listing_approve();
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'approvelist'		=> $approvelist,
							 'isi'				=> 'approve/keluar'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	


	public function approve_keluar_setujui()
	{	
		$id= $this->uri->segment(4);
		$i = $this->input;
	
			$m = $this->barangkeluar_model->detail($id);
		$id_stok=$m->id_stok;
		
		$j=$m->jumlah;
		$t=$m->tanggal_keluar;
		
				//$qty = $this->stok_model->get_product($barcode);
		
		
				//$qty = $this->stok_model->get_product($barcode);
		
				
					$n = $this->stok_model->detail1($id_stok);
					$y=$m->jumlah;
				
					$x=$n->stok;
					$kondisi=$n->kondisi;
					$barcode=$n->barcode;
					$barang4=$this->barang_model->detail1($barcode);
					$id_jenis=$barang4->id_jenis;
					$id_type=$barang4->id_type;
					$jenis1=$this->jenis_model->detail($id_jenis);
					$jenis=$jenis1->jenis_barang;
					$type1=$this->type_model->detail($id_type);
							$type=$type1->type_barang;
					$id_lokasi=$n->lokasi;
						$s1=$this->lokasi_model->detail($id_lokasi);
					$l=$s1->lokasi_barang;
							$s2=$this->kondisi_model->detail($kondisi);
					$l1=$s2->kondisi_barang;
						$b1 = $this->barang_model->detail1($barcode);
					$b2=$b1->barcode;
					$b4=$b1->nama_barang;
							// $sisa = $qty['stok'] ;
					$c= $x-$y;
				
								
				if($c>=0){
						$data = array ( 'id_keluar' => $id,
						'approve'  => "yes");
				// var_dump($data);
				// die();
				
				$update = $this->barangkeluar_model->edit($data);
				$data1 = array ( 
				'id_stok' =>$id_stok,
				'stok' => $c,
					);
					
				  $this->stok_model->edit($data1);

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
							 	'jenis'			=> "keluar"
							 	
 						);

				$this->barangkeluar_model->tambah1($data2);
				$this->session->set_flashdata('sukses', 'Data telah diupdate.');
	
				redirect(base_url('approve/keluar'),'refresh');
				}
				else{
					 echo $this->session->set_flashdata('notifa', ' tidak cukup stok!');
							redirect(base_url('approve/keluar'));
				}
	}		
	public function delete($id_keluar){
			//proteksi delete
			
			$barangkeluar = $this->barangkeluar_model->detail($id_keluar);
			$data = array(	'id_keluar'	=> $barangkeluar->id_keluar);
			$this->barangkeluar_model->delete($data);
			helper_log("delete", "menghapus data transaksi barang keluar");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('barangkeluar'),'refresh');
			}


public function tambah ()
	{
		$barang = $this->barang_model->listing();
		$barangkeluar = $this->barangkeluar_model->listing();
		$barangkeluar1 = $this->barangkeluar_model->listing4();
		$barangmasuk = $this->barangmasuk_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$stok = $this->stok_model->listing();
		$kondisi = $this->kondisi_model->listing();
		
		$valid = $this->form_validation;

		$valid->set_rules('id_stok','id_stok','required',
				array('required'	=> '%s harus diisi'));

		
		$valid->set_rules('jumlah','Jumlah','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Barang',
							'barang'	=> $barang,
							'barangmasuk'	=> $barangmasuk,
							'barangkeluar1'	=> $barangkeluar1,
							'lokasi'	=> $lokasi,
							'kondisi'	=> $kondisi,
							'stok'	=> $stok,
							'isi'		=>'barangkeluar/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				
			
				$i = $this->input;
				$data = array (	'id_keluar'			=> $i->post('id_keluar'),
								'tanggal_keluar'	=> $i->post('tanggal_keluar'),
								'id_stok'			=> $i->post('id_stok'),
							
							 	'jumlah'			=> $i->post('jumlah'),
							 	//'jumlah1'			=> 0,
							 	
							 	'approve'			=> "no"
							 	
 						);
								$id_stok=$this->input->post('id_stok', TRUE);
								$jumlah=$this->input->post('jumlah', TRUE);
				
				//$qty = $this->stok_model->get_product($barcode);
		
				
					$n = $this->stok_model->detail1($id_stok);
					
					$x=$n->stok;
							// $sisa = $qty['stok'] ;
					$c= $x-$jumlah;
					if($c>=0&&$jumlah!=0){
						
						
				$this->barangkeluar_model->tambah($data);

				helper_log("tambah", "menambahkan data transaksi barang keluar");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('barangkeluar'),'refresh');
				}elseif($jumlah==0){
					echo $this->session->set_flashdata('notifa', 'Jumlah tidak boleh nol!');
									
						 
						  $data = array (		'title'		=>'Tambah Barang',
							'barang'	=> $barang,
							'barangmasuk'	=> $barangmasuk,
							'barangkeluar1'	=> $barangkeluar1,
							'lokasi'	=> $lokasi,
							'kondisi'	=> $kondisi,
							'stok'	=> $stok,
							'isi'		=>'barangkeluar/tambah'
		);
	
			$this->load->view('layout/wrapper', $data);
					
				}else{
						 echo $this->session->set_flashdata('notifa', ' tidak cukup stok!');
									
						 
						  $data = array (		'title'		=>'Tambah Barang',
							'barang'	=> $barang,
							'barangmasuk'	=> $barangmasuk,
							'barangkeluar1'	=> $barangkeluar1,
							'lokasi'	=> $lokasi,
							'kondisi'	=> $kondisi,
							'stok'	=> $stok,
							'isi'		=>'barangkeluar/tambah'
		);
	
			$this->load->view('layout/wrapper', $data);
					}
			}

		
	}

	//Edit
	public function edit ($id_keluar)
	{
		$barangkeluar = $this->barangkeluar_model->detail($id_keluar);
		$barang = $this->barang_model->listing();
		$lokasi = $this->lokasi_model->listing();
			$stok = $this->stok_model->listing();
					$barangkeluar1 = $this->barangkeluar_model->listing4();
		//validasi
		$valid = $this->form_validation;


		

	

		$valid->set_rules('jumlah','jumlah','required',
				array('required'	=> '%s harus diisi'));

	

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Edit Barang : '.$barangkeluar->id_keluar,
							'barangkeluar'	=> $barangkeluar,
										'barangkeluar1'	=> $barangkeluar1,
							'barang'		=> $barang,
							'lokasi'		=> $lokasi,
							'stok'		=> $stok,
							'isi'		=>'barangkeluar/edit'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//keluaran database
		}else{
				$i = $this->input;
				$data = array (	'id_keluar'			=> $i->post('id_keluar'),
								'tanggal_keluar'	=> $i->post('tanggal_keluar'),
								'id_stok'			=> $i->post('id_stok'),
							
							 	'jumlah'			=> $i->post('jumlah'),
							 	//'jumlah1'			=> $i->post('jumlah1'),
							 	
							 	
 						);
						
				$id_stok=$this->input->post('id_stok', TRUE);
								$jumlah=$this->input->post('jumlah', TRUE);
				
				//$qty = $this->stok_model->get_product($barcode);
		
				
					$n = $this->stok_model->detail1($id_stok);
					
					$x=$n->stok;
							// $sisa = $qty['stok'] ;
					$c= $x-$jumlah;
				if($c>=0&&$jumlah!=0){
						
						
				$this->barangkeluar_model->edit($data);

				helper_log("edit", "mengubah data transaksi barang keluar");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('barangkeluar'),'refresh');
				}elseif($jumlah==0){
					 echo $this->session->set_flashdata('notifa', 'masukan jumlah dengan benar!');
									
						 
					$data = array (		'title'		=>'Edit Barang : '.$barangkeluar->id_keluar,
							'barangkeluar'	=> $barangkeluar,
										'barangkeluar1'	=> $barangkeluar1,
							'barang'		=> $barang,
							'lokasi'		=> $lokasi,
							'stok'		=> $stok,
							'isi'		=>'barangkeluar/edit'
		);
	
			$this->load->view('layout/wrapper', $data);
				}
				else{
						 echo $this->session->set_flashdata('notifa', ' tidak cukup stok!');
									
						 
					$data = array (		'title'		=>'Edit Barang : '.$barangkeluar->id_keluar,
							'barangkeluar'	=> $barangkeluar,
										'barangkeluar1'	=> $barangkeluar1,
							'barang'		=> $barang,
							'lokasi'		=> $lokasi,
							'stok'		=> $stok,
							'isi'		=>'barangkeluar/edit'
		);
	
			$this->load->view('layout/wrapper', $data);
					}
						
			
			}
			//end keluar data base
	}

}