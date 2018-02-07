<?php
class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Clientes_model');
		$this->load->model('Empleados_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		
		$data['lista_clientes'] = $this->Clientes_model->getAll();
					
		$data['_view'] = 'clientes/index';
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $data = array(
				'CUIT' => $this->input->post('CUIT'),
				'RAZON_SOCIAL' => $this->input->post('RAZON_SOCIAL'),
				'DOMICILIO' => $this->input->post('DOMICILIO'),
				'TELEFONO' => $this->input->post('TELEFONO'),
				'LEGAJO_ENCARGADO' => $this->input->post('LEGAJO_ENCARGADO'),
				'ESTADO' => 'ACTIVO'
            );
            
            $empleado_id = $this->Clientes_model->insert($data);
            redirect('clientes/index');
        }
        else
        {            
			$data['lista_clientes'] = $this->Clientes_model->getAll();
			$data['lista_empleados'] = $this->Empleados_model->getAll();
            $data['_view'] = 'clientes/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	function eliminar($id)
    {
        $data = $this->Clientes_model->getById($id);

        if(isset($data['CUIT']))
        {
            $this->Clientes_model->delete($id);
            redirect('clientes/index');
        }
        else
            show_error('El cliente no existe.');
    }
	
	function editar($id)
    {   
        $data['cliente'] = $this->Clientes_model->getById($id);
        
        if(isset($data['cliente']['CUIT']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $data = array(
					'RAZON_SOCIAL' => $this->input->post('RAZON_SOCIAL'),
					'DOMICILIO' => $this->input->post('DOMICILIO'),
					'TELEFONO' => $this->input->post('TELEFONO'),
					'LEGAJO_ENCARGADO' => $this->input->post('LEGAJO_ENCARGADO'),
					'ESTADO' => $this->input->post('ESTADO'),
                );

                $this->Clientes_model->update($id,$data);            
                redirect('clientes/index');
            }
            else
            {
                $data['_view'] = 'clientes/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El cliente no existe');
    } 
}