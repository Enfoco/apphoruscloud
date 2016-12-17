<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = array(
			'title'		=> 'AVS| Error404',
			'error'		=> 'Oops');
		$this->loadErrors('error_404', $data);
		
	}

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */