<?php
class Empleados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Empleados_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		
		$data['lista_empleados'] = $this->Empleados_model->getAll();
					
		$data['_view'] = 'empleados/index';
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $data = array(
				'LEGAJO' => $this->input->post('LEGAJO'),
				'NOMBRE' => $this->input->post('NOMBRE'),
				'APELLIDO' => $this->input->post('APELLIDO'),
				'DOMICILIO' => $this->input->post('DOMICILIO'),
				'TELEFONO' => $this->input->post('TELEFONO'),
				//'PASSWORD' => $this->Empleados_model->createPassword($this->input->post('PASSWORD')),
				'PASSWORD' => $this->input->post('PASSWORD'),
            );
            
            $empleado_id = $this->Empleados_model->insert($data);
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
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $data = array(
					'NOMBRE' => $this->input->post('NOMBRE'),
					'APELLIDO' => $this->input->post('APELLIDO'),
					'DOMICILIO' => $this->input->post('DOMICILIO'),
					'TELEFONO' => $this->input->post('TELEFONO'),
					//'PASSWORD' => $this->Empleados_model->createPassword($this->input->post('PASSWORD')),
					'PASSWORD' => $this->input->post('PASSWORD'),
                );

                $this->Empleados_model->update($id,$data);            
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
}