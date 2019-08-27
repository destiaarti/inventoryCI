<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('barang_model');
		$this->load->model('barangmasuk_model');
		$this->load->model('barangkeluar_model');
		$this->load->model('user_model');
		$this->load->model('log_model');

	}

	public function index()
	{	
		// var_dump(json_encode($bka));
		// die;

		$pegawai 			= $this->pegawai_model->listing();
		$barang				= $this->barang_model->listing();
		$barangmasuk		= $this->barangmasuk_model->listing();
		$barangkeluar		= $this->barangkeluar_model->listing();
		$user				= $this->user_model->listing();
		$log 				= $this->log_model->listing();
			$data1		= $this->barangmasuk_model->get_stok();
		$barangkeluar1		= $this->barangkeluar_model->getJumlahBarangKeluar();
		

		$data 		= array ('title'	=> 'Halaman Dashboard Administator',
							 'pegawai'		=> $pegawai,
							 'barang'		=> $barang,
							 'barangmasuk'	=> $barangmasuk,
							 'barangkeluar'	=> $barangkeluar,
							 'log'			=> $log,
							 'reset_log'	=>	"admin",
							 'user'			=> $user,
								 'data1'			=> $data1,
							 'isi'		=> '/dashboard/list'		
						);
		$this->load->view('/layout/wrapper', $data);
	}

		public function reset_log()
	 {
		  $query= $this->db->query('DELETE FROM tabel_log');
		  $query= $this->db->query('ALTER TABLE tabel_log AUTO_INCREMENT = 1');
		  redirect('Dashboard');
	 }

	public function getLalinBarang() {
		$bma = []; $bka = [];
		for ($i=5; $i < 13; $i++) { 
			$bm = $this->barangmasuk_model->getJumlahBarangMasuk($i, date('Y'));
			$bk = $this->barangkeluar_model->getJumlahBarangKeluar($i, date('Y'));	
			array_push($bma, $bm);
			array_push($bka, $bk);
		}

		echo json_encode(['masuk' => $bma, 'keluar' => $bka]);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
