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
		if(isset($_POST) && count($_POST) > 0){
			$data['lista_proveedores'] = $this->Proveedores_model->search($_POST['field'], $_POST['searchword']);
		}
		else{
			$data['lista_proveedores'] = $this->Proveedores_model->getAll();
		}					
		$data['_view'] = 'proveedores/index';
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
        $this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
	    $this->form_validation->set_rules('CUIT', 'C.U.I.T.', 'xss_clean|required|is_unique[proveedores.CUIT]|min_length[10]|max_length[11]');
	    $this->form_validation->set_rules('RAZON_SOCIAL', 'Razon social', 'xss_clean|trim|required|min_length[3]|max_length[50]');
	    $this->form_validation->set_rules('DOMICILIO', 'Domicilio', 'xss_clean|max_length[50]'); 
	    $this->form_validation->set_rules('TELEFONO', 'Telefono', 'xss_clean|numeric|max_length[11]'); 
	    
        if ($this->form_validation->run())  // si las validaciones fueron correctas...
        {   
            $data = array(
				'CUIT' => $this->input->post('CUIT'),
				'RAZON_SOCIAL' => $this->input->post('RAZON_SOCIAL'),
				'DOMICILIO' => $this->input->post('DOMICILIO'),
				'TELEFONO' => $this->input->post('TELEFONO')
            );
            
            $this->Proveedores_model->insert($data);
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
			// formato de las validaciones
			$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
            $this->form_validation->set_rules('RAZON_SOCIAL', 'Razon social', 'xss_clean|trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('DOMICILIO', 'Domicilio', 'xss_clean|max_length[50]'); 
			$this->form_validation->set_rules('TELEFONO', 'Telefono', 'xss_clean|numeric|max_length[11]'); 
			
			if ($this->form_validation->run())  // si las validaciones fueron correctas...
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