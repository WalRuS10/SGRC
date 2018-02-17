<?php
class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Proveedores_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		
		$data['lista_proveedores'] = $this->Proveedores_model->getAll();
					
		$data['_view'] = 'proveedores/index';
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
				'TELEFONO' => $this->input->post('TELEFONO')
            );
            
            $empleado_id = $this->Proveedores_model->insert($data);
            redirect('proveedores/index');
        }
        else
        {            
            $data['_view'] = 'proveedores/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	function eliminar($id)
    {
        $data = $this->Proveedores_model->getById($id);

        if(isset($data['CUIT']))
        {
            $this->Proveedores_model->delete($id);
            redirect('proveedores/index');
        }
        else
            show_error('El proveedor no existe.');
    }
	
	function editar($id)
    {   
        $data['proveedor'] = $this->Proveedores_model->getById($id);
        
        if(isset($data['proveedor']['CUIT']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $data = array(
					'RAZON_SOCIAL' => $this->input->post('RAZON_SOCIAL'),
					'DOMICILIO' => $this->input->post('DOMICILIO'),
					'TELEFONO' => $this->input->post('TELEFONO')
                );

                $this->Proveedores_model->update($id,$data);            
                redirect('proveedores/index');
            }
            else
            {
                $data['_view'] = 'proveedores/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El proveedor no existe');
    } 
	
	public function imprimir()
	{
		
		$data['lista_proveedores'] = $this->Proveedores_model->getAll();		
				
		$data['_view'] = 'proveedores/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}