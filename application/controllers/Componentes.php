<?php
class Componentes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Componentes_model');
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
        if(isset($_POST) && count($_POST) > 0)     
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
            if(isset($_POST) && count($_POST) > 0)     
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
}