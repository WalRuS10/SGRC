<?php
class Componentes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Componentes_model');
		$this->load->model('Empleados_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('cuenta/logout');
		}
		
		$validuser = $this->Empleados_model->searchExact("NOMBRE", $this->session->NOMBRE);
		if($validuser['CARGO'] == "T") {
			$message = "Debe ser usuario ADMINISTRADOR o ENCARGADO para acceder a este módulo";
			//echo "<script type='text/javascript'>alert('$message');window.location = ('home/index') </script>";
			redirect('home/index');;
		}
	}
	public function index()
	{
		if(isset($_POST) && count($_POST) > 0){
			$data['lista_componentes'] = $this->Componentes_model->search($_POST['field'], $_POST['searchword']);
		}
		else{
			$data['lista_componentes'] = $this->Componentes_model->getAll();
		}
		$data['_view'] = 'componentes/index';
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
		// ejemplo de validaciones
		// formato de las validaciones
		$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
	    $this->form_validation->set_rules('DESCRIPCION', 'Descripción', 'xss_clean|required|max_length[50]');
	    $this->form_validation->set_rules('STOCK', 'Stock', 'xss_clean|numeric|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('PRECIO_COMPRA', 'Precio de Compra', 'xss_clean|numeric|max_length[50]'); 
		
        if($this->form_validation->run())     
        {
            $data = array(
				'DESCRIPCION' => $this->input->post('DESCRIPCION'),
				'STOCK' => $this->input->post('STOCK'),
				'PRECIO_COMPRA' => $this->input->post('PRECIO_COMPRA')
            );
            
            $id_componente = $this->Componentes_model->insert($data);
            redirect('componentes/index');
        }
        else
        {            
            $data['_view'] = 'componentes/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	public function eliminar($id)
    {
        $data = $this->Componentes_model->getById($id);

        if(isset($data['ID_COMPONENTE']))
        {
            $this->Componentes_model->delete($id);
            redirect('componentes/index');
        }
        else
            show_error('El componente no existe.');
    }
	
	public function editar($id)
    {   
        $data['componente'] = $this->Componentes_model->getById($id);
        
        if(isset($data['componente']['ID_COMPONENTE']))
        {
			// ejemplo de validaciones
			// formato de las validaciones
			$this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
			
			// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
			$this->form_validation->set_rules('DESCRIPCION', 'Descripción', 'xss_clean|required|max_length[50]');
			$this->form_validation->set_rules('STOCK', 'Stock', 'xss_clean|numeric|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('PRECIO_COMPRA', 'Precio de Compra', 'xss_clean|numeric|max_length[50]'); 
		
            if($this->form_validation->run())     
            {   
                $data = array(
					'DESCRIPCION' => $this->input->post('DESCRIPCION'),
					'STOCK' => $this->input->post('STOCK'),
					'PRECIO_COMPRA' => $this->input->post('PRECIO_COMPRA')
                );

                $this->Componentes_model->update($id,$data);            
                redirect('componentes/index');
            }
            else
            {
				$data['proveedores_componente'] = $this->Componentes_model->getProveedoresComponente($id);
                $data['_view'] = 'componentes/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El componente no existe');
    } 
	
	public function agregar_proveedor($id_componente, $cuit_proveedor, $precio)
	{
		$this->Componentes_model->add_proveedor_componente($cuit_proveedor, $id_componente, $precio);
		redirect("componentes/editar/$id_componente");
	}
	
	public function remover_proveedor($id_componente, $cuit_proveedor)
	{
		$this->Componentes_model->remove_proveedor_componente($cuit_proveedor, $id_componente);
		redirect("componentes/editar/$id_componente");
	}
	
	public function imprimir()
	{
		
		$data['lista_componentes'] = $this->Componentes_model->getAll();		
				
		$data['_view'] = 'componentes/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}