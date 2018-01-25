<?php
class Computadoras extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Computadoras_model');
		$this->load->model('Clientes_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		
		$data['lista_computadoras'] = $this->Computadoras_model->getAll();
		$data['lista_clientes'] = $this->Clientes_model->getAll();
					
		$data['_view'] = 'computadoras/index';
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $data = array(
				'CUIT_CLIENTE' => $this->input->post('CUIT_CLIENTE'),
				'FECHA_INGRESO' => $this->input->post('FECHA_INGRESO')
            );
            
            $id_computadora = $this->Computadoras_model->insert($data);
            redirect('computadoras/index');
        }
        else
        {            
			$data['lista_clientes'] = $this->Clientes_model->getAll();
            $data['_view'] = 'computadoras/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	function eliminar($id)
    {
        $data = $this->Computadoras_model->getById($id);

        if(isset($data['ID_COMPUTADORA']))
        {
            $this->Computadoras_model->delete($id);
            redirect('computadoras/index');
        }
        else
            show_error('El computadora no existe.');
    }
	
	function editar($id)
    {   
        $data['computadora'] = $this->Computadoras_model->getById($id);
        
        if(isset($data['computadora']['ID_COMPUTADORA']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $data = array(
					'CUIT_CLIENTE' => $this->input->post('CUIT_CLIENTE'),
					'FECHA_INGRESO' => $this->input->post('FECHA_INGRESO')
                );

                $this->Computadoras_model->update($id,$data);            
                redirect('computadoras/index');
            }
            else
            {
				$data['lista_clientes'] = $this->Clientes_model->getAll();
                $data['_view'] = 'computadoras/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La computadora no existe');
    } 
}