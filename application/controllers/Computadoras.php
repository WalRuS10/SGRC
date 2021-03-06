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
		$this->load->helper('date');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		if(isset($_POST) && count($_POST) > 0){
			$data['lista_computadoras'] = $this->Computadoras_model->search($_POST['field'], $_POST['searchword']);
		}
		else{
			$data['lista_computadoras'] = $this->Computadoras_model->getAll();
		}
		$data['_view'] = 'computadoras/index';
		$this->load->view('layouts/main',$data);
	}
	
	public function nuevo()
	{   
		$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		$this->form_validation->set_rules('FECHA_INGRESO', 'Fecha de ingreso', 'xss_clean|required'); 
	   
        if ($this->form_validation->run())  // si las validaciones fueron correctas...    
        {   
            $data = array(
				'CUIT_CLIENTE' => $this->input->post('CUIT_CLIENTE'),
				'FECHA_INGRESO' => nice_date($this->input->post('FECHA_INGRESO'), "Y/m/d"),
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
            $this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
			$this->form_validation->set_rules('FECHA_INGRESO', 'Fecha de ingreso', 'xss_clean|required'); 
	   
			if ($this->form_validation->run())  // si las validaciones fueron correctas...    
			{   
                $data = array(
					'CUIT_CLIENTE' => $this->input->post('CUIT_CLIENTE'),
					'FECHA_INGRESO' => nice_date($this->input->post('FECHA_INGRESO'), "Y/m/d")
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
	
	public function imprimir()
	{
		
		$data['lista_computadoras'] = $this->Computadoras_model->getAll();		
				
		$data['_view'] = 'computadoras/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}