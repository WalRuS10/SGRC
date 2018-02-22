<?php
class Componentes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Componentes_model');
		$this->load->model('Proveedores_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
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
       $this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');
		
		// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
	    $this->form_validation->set_rules('DESCRIPCION', 'Descripcion', 'xss_clean|trim|required|min_length[3]|max_length[50]');
	    $this->form_validation->set_rules('STOCK', 'Stock', 'xss_clean|numeric|max_length[10]'); 
	    $this->form_validation->set_rules('PRECIO_COMPRA', 'Precio compra', 'xss_clean'); 
	   
        if ($this->form_validation->run())  // si las validaciones fueron correctas...
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
		   $this->form_validation->set_error_delimiters('<div class="bg-danger text-light">', '</div>');

			// setear reglas de validacion https://www.codeigniter.com/userguide3/libraries/form_validation.html
			$this->form_validation->set_rules('DESCRIPCION', 'Descripcion', 'xss_clean|trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('STOCK', 'Stock', 'xss_clean|numeric|max_length[10]'); 
			$this->form_validation->set_rules('PRECIO_COMPRA', 'Precio compra', 'xss_clean'); 
		   
			if ($this->form_validation->run())  // si las validaciones fueron correctas...
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
				$data['proveedores_no_usados'] = $this->Componentes_model->getProveedoresNoUsados($id);
				$data['proveedores_componente'] = $this->Componentes_model->getProveedoresComponente($id);
                $data['_view'] = 'componentes/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El componente no existe');
    } 
	

	public function agregar_proveedor($id_componente)
    {   
		$data['componente'] = $this->Componentes_model->getById($id_componente);
		
		if(isset($data['componente']['ID_COMPONENTE']))
        {
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$proveedor = $this->Proveedores_model->getById($this->input->post('CUIT_PROVEEDOR'));
				$data = array(
					'ID_COMPONENTE' => $id_componente,
					'CUIT_PROVEEDOR' => $this->input->post('CUIT_PROVEEDOR'),
					'PRECIO' => $this->input->post('PRECIO_P')
				);
				
				$this->Componentes_model->addProveedorComponente($data);
				
				redirect('componentes/editar/'.$id_componente);

			}
			else
			{   
				redirect('componetentes/editar/'.$id_componente);
			}
		}
		else
			show_error('El componente no existe');
    }

	public function remover_proveedor($id_componente,$cuit)
	{
		$this->Componentes_model->removeProveedorComponente($cuit,$id_componente);
		redirect('componentes/editar/'.$id_componente);
	}
	
	public function imprimir()
	{
		
		$data['lista_componentes'] = $this->Componentes_model->getAll();		
				
		$data['_view'] = 'componentes/reporte';
		
		$this->load->view('layouts/reporte',$data);
			
	}
}