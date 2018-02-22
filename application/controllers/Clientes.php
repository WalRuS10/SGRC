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
		if(isset($_POST) && count($_POST) > 0){
			$data['lista_clientes'] = $this->Clientes_model->search($_POST['field'], $_POST['searchword']);
		}
		else{
			$data['lista_clientes'] = $this->Clientes_model->getAll();
		}							
		$data['_view'] = 'clientes/index';
		$this->load->view('layouts/main',$data);
	}
	
	public function nuevo()
	{   
        // ejemplo de validaciones
		// formato de las validaciones
		$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
	    $this->form_validation->set_rules('CUIT', 'C.U.I.T.', 'xss_clean|required|is_unique[clientes.CUIT]|min_length[10]|max_length[11]');
	    $this->form_validation->set_rules('RAZON_SOCIAL', 'Razon Social', 'xss_clean|trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('DOMICILIO', 'Domicilio', 'xss_clean|max_length[50]'); 
	    $this->form_validation->set_rules('TELEFONO', 'Telefono', 'xss_clean|numeric|max_length[11]'); 
			
        if ($this->form_validation->run())  // si las validaciones fueron correctas... 
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
			// ejemplo de validaciones
			// formato de las validaciones
			$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
			
			// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
		 
			$this->form_validation->set_rules('RAZON_SOCIAL', 'Razon Social', 'xss_clean|trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('DOMICILIO', 'Domicilio', 'xss_clean|max_length[50]'); 
			$this->form_validation->set_rules('TELEFONO', 'Telefono', 'xss_clean|numeric|max_length[11]'); 
				
			if ($this->form_validation->run())  // si las validaciones fueron correctas... 
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
				$data['lista_empleados'] = $this->Empleados_model->getAll();
                $data['_view'] = 'clientes/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El cliente no existe');
    } 
	
	public function imprimir()
	{
		
		$data['lista_clientes'] = $this->Clientes_model->getAll();		
				
		$data['_view'] = 'clientes/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}