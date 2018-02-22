<?php
class Empleados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Empleados_model');
		$this->load->model('Tecnicos_model');
		$this->load->model('Encargados_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('cuenta');
		}
	}
	public function index()
	{
		//Martín - Se verifica si se introdujo algún valor en el formulario de búsqueda
		if(isset($_POST) && count($_POST) > 0){
			$data['lista_empleados'] = $this->Empleados_model->search($_POST['field'], $_POST['searchword']);
		}
		else{
			$data['lista_empleados'] = $this->Empleados_model->getAll();
		}		
			$data['_view'] = 'empleados/index';
			$this->load->view('layouts/main',$data);
	}
	
	public function nuevo()
	{   
		// ejemplo de validaciones
		// formato de las validaciones
		$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
	    $this->form_validation->set_rules('LEGAJO', 'Legajo', 'required|is_unique[empleados.LEGAJO]');
	    $this->form_validation->set_rules('NOMBRE', 'Nombre', 'trim|required|min_length[3]|max_length[50]');
	    $this->form_validation->set_rules('APELLIDO', 'Apellido', 'trim|required|min_length[3]|max_length[50]'); 
	    $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[5]|max_length[50]');
		
        if ($this->form_validation->run())  // si las validaciones fueron correctas...
        {   
            $data = array(
				'LEGAJO' => $this->input->post('LEGAJO'),
				'NOMBRE' => $this->input->post('NOMBRE'),
				'APELLIDO' => $this->input->post('APELLIDO'),
				'DOMICILIO' => $this->input->post('DOMICILIO'),
				'TELEFONO' => $this->input->post('TELEFONO'),
				'PASSWORD' => $this->input->post('PASSWORD'),
            );
			$cargo = $this->input->post('CARGO');
            
            $empleado_id = $this->Empleados_model->insert($data, $cargo);
            redirect('empleados/index');
        }
        else
        {            
            $data['_view'] = 'empleados/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	function eliminar($id)
    {
        $empleado = $this->Empleados_model->getById($id);

        if(isset($empleado['LEGAJO']))
        {
            $this->Empleados_model->delete($id);
            redirect('empleados/index');
        }
        else
            show_error('El empleado no existe.');
    }
	
	function editar($id)
    {   
        $data['empleado'] = $this->Empleados_model->getById($id);
        
        if(isset($data['empleado']['LEGAJO']))
        {
			$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
			
			// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
			$this->form_validation->set_rules('NOMBRE', 'Nombre', 'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('APELLIDO', 'Apellido', 'trim|required|min_length[3]|max_length[50]'); 
			$this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[5]|max_length[50]');
			
            if ($this->form_validation->run())  // si las validaciones fueron correctas...    
            {   
                $data = array(
					'NOMBRE' => $this->input->post('NOMBRE'),
					'APELLIDO' => $this->input->post('APELLIDO'),
					'DOMICILIO' => $this->input->post('DOMICILIO'),
					'TELEFONO' => $this->input->post('TELEFONO'),
					//'PASSWORD' => $this->Empleados_model->createPassword($this->input->post('PASSWORD')),
					'PASSWORD' => $this->input->post('PASSWORD'),
                );
				$cargo = $this->input->post('CARGO');

                $this->Empleados_model->update($id, $data, $cargo);  
                redirect('empleados/index');
            }
            else
            {
                $data['_view'] = 'empleados/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El empleado no existe');
    }
	
	public function imprimir()
	{
		
		$data['lista_empleados'] = $this->Empleados_model->getAll();		
				
		$data['_view'] = 'empleados/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}