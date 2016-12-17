<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
public $table = 'student';

public function __construct()
{
    parent::__construct();
    //Do your magic here
}


    function save($data)
{
    $this->db->insert($this->table, $data);

}

 public function departamento()
    {
        $this->db->order_by('depNombre','asc');
        $departamento = $this->db->get('department');
        if($departamento->num_rows()>0)
        {
            return $departamento->result();
        }
    }

public function municipio($departamento)
    {
        $this->db->where('department',$departamento);
        $this->db->order_by('munNombre','asc');
        $municipio = $this->db->get('municipality');
        if($municipio->num_rows()>0)
        {
            return $municipio->result();
        }
    }   

    

}

/* End of file student_model.php */
/* Location: ./application/models/student_model.php */