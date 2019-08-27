<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('mutasi_model');
			$this->load->model('barangkeluar_model');
			$this->load->model('user_model');
			$this->load->model('lokasi_model');
			$this->load->model('kondisi_model');
			$this->load->model('barang_model');
			$this->load->model('jenis_model');
			$this->load->model('type_model');
			$this->load->model('stok_model');
	}

	public function index()
	{	
		$mutasi 	= $this->mutasi_model->listing();
		$mutasi1 	= $this->mutasi_model->listing1();
		// var_dump($mutasi);
		// die;
			foreach ($mutasi as $key => $value) {
			$value->penerima = $this->stok_model->namastok($value->id_stok, 'mutasi', 'id_stok');
			$value->pengirim = $this->stok_model->namastok($value->id_stok1, 'mutasi', 'id_stok1');
			
			$value->lokasi = $this->lokasi_model->getlokasi($value->penerima, 'stok', 'lokasi');
			$value->lokasi1 = $this->lokasi_model->getlokasi($value->pengirim, 'stok', 'lokasi');
			
			// $value->pengirim = 
			// $value->pengirim = 
		}

		// var_dump($mutasi);
		// die();
		$data 		= array ('title'	=> 'Mutasi Barang',
							'mutasi'		=> $mutasi,
							'mutasi1'		=> $mutasi1,
							 'isi'		=> 'mutasi/list'		
						);


		// var_dump($mutasi);
		// die();
		$this->load->view('layout/wrapper', $data, FALSE);
	}	

	public function laporanmutasibrg()
	{	
		$lapmutasi 	= $this->mutasi_model->listing_lap();
		// var_dump($lapmutasi);
		// die;
		foreach ($lapmutasi as $key => $value) {
				$value->penerima = $this->stok_model->namastok($value->id_stok, 'mutasi', 'id_stok');
			$value->pengirim = $this->stok_model->namastok($value->id_stok1, 'mutasi', 'id_stok1');
			
			$value->lokasi = $this->lokasi_model->getlokasi($value->penerima, 'stok', 'lokasi');
			$value->lokasi1 = $this->lokasi_model->getlokasi($value->pengirim, 'stok', 'lokasi');
			// $value->pengirim = 
			// $value->pengirim = 
		}


		// var_dump($mutasi);
		// die();
		$data 		= array ('title'	=> 'Mutasi Barang',
							'lapmutasi'		=> $lapmutasi,
							 'isi'		=> 'laporanmutasi/list'		
						);


		// var_dump($mutasi);
		// die();
		$this->load->view('layout/wrapper', $data, FALSE);
	}	
	public function approve_mutasi()
	{	
		$approvelist= $this->mutasi_model->listing_approve();
		foreach ($approvelist as $key => $value) {
			$value->penerima = $this->stok_model->namastok($value->id_stok, 'mutasi', 'id_stok');
			$value->pengirim = $this->stok_model->namastok($value->id_stok1, 'mutasi', 'id_stok1');
			
			$value->lokasi = $this->lokasi_model->getlokasi($value->penerima, 'stok', 'lokasi');
			$value->lokasi1 = $this->lokasi_model->getlokasi($value->pengirim, 'stok', 'lokasi');
			
			// $value->pengirim = 
			// $value->pengirim = 
		}
		$data 		= array ('title'			=> 'Halaman Dashboard Administator',
							'approvelist'		=> $approvelist,
							 'isi'				=> 'approve/mutasi'		
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	


	public function approve_mutasi_setujui()
	{	
		$id= $this->uri->segment(4);
		$i = $this->input;
	
			$m = $this->mutasi_model->detail($id);
		$id_stok=$m->id_stok;
		$id_stok1=$m->id_stok1;
		$j=$m->jumlah;
		$tang=$m->tanggal;
				//$qty = $this->stok_model->get_product($barcode);
		
		
				//$qty = $this->stok_model->get_product($barcode);
		
				
					
							$n = $this->stok_model->detail1($id_stok);
							$m = $this->stok_model->detail1($id_stok1);

					$y1=$m->stok;
					$y2=$n->stok;
					$id_kondisi=$n->kondisi;
					$id_lokasi=$n->lokasi;
					$id_lokasi1=$m->lokasi;
						$s=$this->lokasi_model->detail($id_lokasi);
					$l=$s->lokasi_barang;
						$s1=$this->lokasi_model->detail($id_lokasi1);
					$l1=$s1->lokasi_barang;
					$barcode=$n->barcode;
		$s3=$this->kondisi_model->detail($id_kondisi);
					$k3=$s3->kondisi_barang;
					$c2=$y2-$j;
					$c1=$y1+$j;
$k = $this->barang_model->detail1($barcode);
$b4=$k->nama_barang;
$barang4=$this->barang_model->detail1($barcode);
					$id_jenis=$barang4->id_jenis;
					$id_type=$barang4->id_type;
					$jenis1=$this->jenis_model->detail($id_jenis);
					$jenis=$jenis1->jenis_barang;
					$type1=$this->type_model->detail($id_type);
							$type=$type1->type_barang;					
				if($c2>=0){
						$data = array ( 'id_mutasi' => $id,
						'approve'  => "yes");
				// var_dump($data);
				// die();
				
				$update = $this->mutasi_model->edit($data);
				$data1 = array ( 
				'id_stok' =>$id_stok,
				'stok' => $c2,
					);
					
				  $this->stok_model->edit($data1);
			$data2 = array ( 
				'id_stok' =>$id_stok1,
				'stok' => $c1,
					);
					
				  $this->stok_model->edit($data2);
				 


		

				  	  	$data3 = array (	
								'id_transaksi'	=> $id,
								'tanggal'			=> $tang,
								'status'			=> $k3,
							 	'jml'			=> $j,

											'barcode' 			=> $barcode,
								'lokasi' 			=> $l,
								'lokasi1' 			=> $l1,
								'nama' 			=> $b4,
								'jenis_barang' 			=> $jenis,
								'type_barang' 			=> $type,
							 	'jenis'			=> "mutasi"
							 	
 						);

				$this->barangkeluar_model->tambah1($data3);
				$this->session->set_flashdata('sukses', 'Data telah diupdate.');
	
				redirect(base_url('approve/mutasi'),'refresh');
				}
				else{
					 echo $this->session->set_flashdata('notifa', ' tidak cukup stok!');
							redirect(base_url('approve/mutasi'));
				}
	}		
	public function delete($id_mutasi){
			//proteksi delete
			
			$mutasi = $this->mutasi_model->detail($id_mutasi);
			$data = array(	'id_mutasi'	=> $mutasi->id_mutasi);
			$this->mutasi_model->delete($data);
			helper_log("update", "update data profile");
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('mutasi'),'refresh');
			}

	public function tambah ()
	{
		//validasi
		$barang = $this->barang_model->listing();
		// $lokasi = $this->mutasi_model->listing();
		$lokasi = $this->lokasi_model->listing();
		$stok = $this->stok_model->listing();
	//	$stok1 = $this->stok_model->listing();
		$mutasi = $this->mutasi_model->listing();
		$mutasi1 = $this->mutasi_model->listing1();
		$valid = $this->form_validation;
		// var_dump($lokasi);
		

		$valid->set_rules('no_mutasi','No. Mutasi','required|is_unique[mutasi.no_mutasi]',
				array('required'	=> '%s harus diisi',
					  'is_unique'	=> '%s <strong>'.$this->input->post('no_mutasi').'</strong> sudah digunakan, buat baru!'));

	

		$valid->set_rules('jumlah','Jumlah','required',
				array('required'	=> '%s harus diisi'));

		if ($valid->run() === FALSE){
			//end validasi
			

		$data = array (		'title'		=>'Tambah Mutasi',
							'barang'	=> $barang,
							'lokasi'    => $lokasi,
							'mutasi1'    => $mutasi1,
			
							'stok'	=> $stok,
							'stok1'	=> $stok,
							'isi'		=>'mutasi/tambah'
		);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_mutasi'			=> $i->post('id_mutasi'),
								'no_mutasi'			=> $i->post('no_mutasi'),
								'tanggal'			=> $i->post('tanggal'),
								'id_stok'			=> $i->post('id_stok'),
								'id_stok1'			=> $i->post('id_stok1'),
					
								'jumlah'				=> $i->post('jumlah'),
								'approve'				=> "no"

							 	
							 	
 						);
						$id_stok=$this->input->post('id_stok', TRUE);
						$j=$this->input->post('jumlah', TRUE);
						$id_stok1=$this->input->post('id_stok1', TRUE);
							$n = $this->stok_model->detail1($id_stok);
							$m = $this->stok_model->detail1($id_stok1);
					
					$x=$n->barcode;
					$x1=$n->lokasi;
	
	$k1=$n->kondisi;
	$k2=$m->kondisi;
	
					$y=$m->barcode;
					$y1=$m->lokasi;
					$y2=$n->stok;
	
					$c2=$y2-$j;
				if($x!=$y||$x1==$y1||$k1!=$k2||$c2<0){
				if($x!=$y){
				echo $this->session->set_flashdata('notif', ' barcode barang harus sama!');}
							 elseif($x1==$y1){
						     echo $this->session->set_flashdata('notif', ' lokasi pengirim dan penerima harus berbeda!');}
						 elseif($c2<0){
						     echo $this->session->set_flashdata('notif', ' stok tidak cukup!');}
							 elseif($k1!=$k2){
						     echo $this->session->set_flashdata('notif', ' kondisi barang harus sama!');}
							 
							 $data = array (		'title'		=>'Tambah Mutasi',
									'barang'	=> $barang,
												'mutasi1'    => $mutasi1,
							'lokasi'    => $lokasi,
							'stok'	=> $stok,
							'stok1'	=> $stok,
							'isi'		=>'mutasi/tambah'
		);
				$this->load->view('layout/wrapper', $data, FALSE);}
			else{
				$add = $this->mutasi_model->tambah($data);
				
				helper_log("tambah", "menambahkan data transaksi mutasi barang");
				$this->session->set_flashdata('sukses', 'data telah ditambah');
				redirect(base_url('mutasi'),'refresh');
				}}
	}

	//Edit
	public function edit ($id_mutasi)
	{
		$mutasi = $this->mutasi_model->detail($id_mutasi);
		$barang = $this->barang_model->listing();
			$stok = $this->stok_model->listing();
			$mutasi1 = $this->mutasi_model->listing1();
	//   $lokasi = $this->db->get_where('lokasi')->result();
		//validasi
		$valid = $this->form_validation;


		$valid->set_rules('no_mutasi','No. Mutasi','required',
				array('required'	=> '%s harus diisi'));



		$valid->set_rules('jumlah','Jumlah','required',
				array('required'	=> '%s harus diisi'));


		if ($valid->run() === FALSE){
			//end validasi
			
		$i = $this->input;
		$data = array (		'title'		=>'Edit Mutasi : '.$mutasi->id_mutasi,
							'barang'	=> $barang,
							'mutasi'		=> $mutasi,
							'mutasi1'		=> $mutasi1,
							'stok'		=> $stok,
							'stok1'		=> $stok,
							'isi'		=>'mutasi/edit',
							'id_mutasi'			=> $i->post('id_mutasi'),
									'id_stok'			=> $i->post('id_stok'),
									'id_stok1'			=> $i->post('id_stok1'),
									
						//	'lokasi'		=> $lokasi
		);
		
			   $data['lokasi'] = $this->db->get_where('lokasi')->result();
			$this->load->view('layout/wrapper', $data);
			//masukan database
		}else{
				$i = $this->input;
				$data = array (	'id_mutasi'			=> $i->post('id_mutasi'),
								'no_mutasi'			=> $i->post('no_mutasi'),
								'tanggal'			=> $i->post('tanggal'),
						
									'id_stok'			=> $i->post('id_stok'),
									'id_stok1'			=> $i->post('id_stok1'),
								'jumlah'				=> $i->post('jumlah')
 						);
											$id_stok=$this->input->post('id_stok', TRUE);
						$j=$this->input->post('jumlah', TRUE);
						$id_stok1=$this->input->post('id_stok1', TRUE);
							$n = $this->stok_model->detail1($id_stok);
							$m = $this->stok_model->detail1($id_stok1);
					
					$x=$n->barcode;
					$x1=$n->lokasi;
	
					$y=$m->barcode;
					$y1=$m->lokasi;
					$y2=$n->stok;
	
		$k1=$n->kondisi;
	$k2=$m->kondisi;
					$c2=$y2-$j;
				if($x!=$y||$x1==$y1||$k1!=$k2||$c2<0){
				if($x!=$y){
				echo $this->session->set_flashdata('notif', ' barcode barang harus sama!');}
							 elseif($x1==$y1){
						     echo $this->session->set_flashdata('notif', ' lokasi pengirim dan penerima harus berbeda!');}
						 elseif($c2<0){
						     echo $this->session->set_flashdata('notif', ' stok tidak cukup!');}
							 elseif($k1!=$k2){
						     echo $this->session->set_flashdata('notif', ' kondisi barang harus sama!');}
	
			
							 	$i = $this->input;
		$data = array (		'title'		=>'Edit Mutasi : '.$mutasi->id_mutasi,
							'barang'	=> $barang,
							'mutasi'		=> $mutasi,
							'mutasi1'		=> $mutasi1,
							'isi'		=>'mutasi/edit',
							'id_mutasi'			=> $i->post('id_mutasi'),
									'id_stok'			=> $i->post('id_stok'),
									'id_stok1'			=> $i->post('id_stok1'),
						//	'lokasi'		=> $lokasi
		);
		
			   $data['lokasi'] = $this->db->get_where('lokasi')->result();
			$this->load->view('layout/wrapper', $data);
					}else{	
				$this->mutasi_model->edit($data);
				helper_log("edit", "mengubah data mutasi barang");
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('mutasi'),'refresh');
		}}
			//end masuk data base
	}

}