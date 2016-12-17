<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends My_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Student_model');

	
}
	public function index()
	{
		$data = array(
			'title'  =>  'Alumno',
		'departamento' 		=> $this->Student_model->departamento(),
				);
		$this->loadTheme('index', $data);
	}

	public function municipio()
	{
		$options = "";
		if($this->input->post('departamento'))
		{
			$departamento = $this->input->post('departamento');
			$municipio = $this->Student_model->municipio($departamento);
			foreach($municipio as $fila)
			{
			?>
				<option value="<?=$fila -> id ?>"><?=$fila -> munNombre ?></option>
			<?php
			}
		}
	}

	public function save()
	{
		$validasi = array(
			array('field'=>'email', 'label'=>'Correo', 'rules'=>'required|valid_email|is_unique[institution.email]'),
			array('field'=>'codigo', 'label'=>'Codigo', 'rules'=>'required'),
			);
		$this->form_validation->set_rules($validasi);
		$this->form_validation->set_message('required', 'El campo %s es requerido');
		$this->form_validation->set_message('valid_email', 'El campo %s no contiene una cuenta de correo valida');
		$this->form_validation->set_message('min_length', 'El campo %s debe contener minimo 9 carácteres');
		$this->form_validation->set_message('max_length', 'El campo %s debe contener máximo 9 carácteres');
		if($this->form_validation->run()===FALSE){
			$info['success']=FALSE;
			$info['errors']= validation_errors();
		}else{
			$info['success']= TRUE;
		$inst = 1;
		$ed = $this->input->post('fechaNacimiento');
		     
					$birth = new DateTime($ed); 
					$today = new DateTime(); 
					$diff = $birth->diff($today); 
					$edad =  $diff->format('%y'); 
		

		$data = array(
			'institution'	=>	$inst,
			'nombre'		=>	$this->input->post('nombre'),
			'apellido'		=>  $this->input->post('apellido'),
			'codigo'		=>	$this->input->post('codigo'),
			'department'	=>	$this->input->post('departamento'),
			'municipality'	=>	$this->input->post('municipio'),
			'direccion'		=>	$this->input->post('direccion'),
			'telefono1'		=>	$this->input->post('telefono1'),
			'telefono2'		=>	$this->input->post('telefono2'),
			'email'			=>	$this->input->post('email'),
			'sexo'			=>	$this->input->post('sexo'),
			'edad'			=> $edad,
			'fechaNacimiento'=>	$this->input->post('fechaNacimiento'),
			'observacion'	=>	$this->input->post('observacion')
			


			);

		$this->Student_model->save($data);
			$info['message']= 'Los datos del Alumno fueron cargados correctamente';
		
	}
		$this->output->set_content_type('application/json')->set_output(json_encode($info));

	}
}

/* End of file estudent.php */
/* Location: ./application/controllers/estudent.php */