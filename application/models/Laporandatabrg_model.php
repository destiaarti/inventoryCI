<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporandatabrg_model extends CI_Model {
//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


}