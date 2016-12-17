<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends My_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Calendar_model');
	
}
public function index()
	{
		 $this->load->view("index");		
	}

public function getEventos()
{
	$r = $this->Calendar_model->getEventos();
	echo json_encode($r);
}

public function updEvento()
{
	$param['id'] = $this->input->post('id');
	$param['fechaIni'] = $this->input->post('fechaIni');
	$param['fechaFin'] = $this->input->post('fechaFin');

	$r = $this->Calendar_model->updEvento($param);
	echo $r;
}

public function delEvento()
{
	$id = $this->input->post('id');
	$r = $this->Calendar_model->delEvento($id);
	echo $r;
}

}

/* End of file Calendar.php */
/* Location: ./application/modules/calendar/controllers/Calendar.php */