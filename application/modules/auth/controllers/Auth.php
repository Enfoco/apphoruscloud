<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('index');	
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */