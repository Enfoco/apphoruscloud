<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {

	public function getEventos()
	{
		$this->db->select('id, eventoNombre As title, fechaIni As start, fechaFin As end');
		$this->db->from('calendar');

		return $this->db->get()->result();

	}
public function updEvento($param)
{
	$campos = array(
		'fechaIni'	=> $param['fechaIni'],
		'fechaFin' => $param['fechaFin'],
		);
	$this->db->where('id', $param['id']);
	$this->db->update('calendar',$campos);

	if($this->db->affected_rows()== 1){
		return 1;
	}else{
		return 0;
	}
}

public function delEvento($id)
{
	$this->db->where('id', $id);
	return $this->db->delete('calendar');

	}

	

}

/* End of file calendar_model.php */
/* Location: ./application/models/calendar_model.php */