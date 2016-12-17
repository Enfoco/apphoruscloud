<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institution extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Institution_model');
		
	}

	public function index()
	{
		$data = array(
			'title'  =>  'Institución',
			'departamento' 		=> $this->Institution_model->departamento(),
				);
		$this->loadTheme('index', $data);
	}

	public function municipio()
	{
		$options = "";
		if($this->input->post('departamento'))
		{
			$departamento = $this->input->post('departamento');
			$municipio = $this->Institution_model->municipio($departamento);
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
			array('field'=>'nit', 'label'=>'Nit', 'rules'=>'required'),
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
			$config['upload_path'] = './uploads/logos';
        	$config['allowed_types'] = 'gif|jpg|png';
        	$config['max_size'] = '2000';
        	$config['max_width'] = '2024';
        	$config['max_height'] = '2008';

 		$this->load->library('upload', $config);
 		if (!$this->upload->do_upload()) {
			$info['errors']= validation_errors();
		}else{
			$file_info = $this->upload->data();
			 $this->_create_thumbnail($file_info['file_name']);
			 $data = array('upload_data' => $this->upload->data());
		$data = array(
			'razonSocial'	=>	$this->input->post('razon'),
			'nit'			=>  $this->input->post('nit'),
			'codigo'		=>	$this->input->post('codigo'),
			'department'	=>	$this->input->post('departamento'),
			'municipality'	=>	$this->input->post('municipio'),
			'direccion'		=>	$this->input->post('direccion'),
			'telefono1'		=>	$this->input->post('telefono1'),
			'telefono2'		=>	$this->input->post('telefono2'),
			'email'			=>	$this->input->post('email'),
			'url'			=>	$this->input->post('url'),
			'observacion'	=>	$this->input->post('observacion'),
			'logo'			=> 	$this->input->post('logo')

			);

		$this->Institution_model->save($data);
			$info['message']= 'Los datos de la Institución fueron cargados correctamente';
		}
	}
		$this->output->set_content_type('application/json')->set_output(json_encode($info));

	}
}

/* End of file institution.php */
/* Location: ./application/controllers/institution.php */