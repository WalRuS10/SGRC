<?php
class Reparaciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Reparaciones_model');
		$this->load->model('Estados_model');
		$this->load->model('Componentes_model');
		$this->load->model('Clientes_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('login');
		}
	}
	public function index()
	{
		
		$data['lista_reparaciones'] = $this->Reparaciones_model->getAll();		
				
		$data['_view'] = 'reparaciones/index';
		
		$this->load->view('layouts/main',$data);
			
	}
	
	public function nuevo()
	{   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $data = array(
				'NRO_ORDEN' => $this->input->post('NRO_ORDEN'),
				'ID_COMPUTADORA' => $this->input->post('ID_COMPUTADORA'),
				'ESTADO_REPARACION' => $this->input->post('ESTADO_REPARACION'),
				'FALLA' => $this->input->post('FALLA'),
				'OBSERVACIONES' => $this->input->post('OBSERVACIONES'),
				'FECHA_ENTREGA' => $this->input->post('FECHA_ENTREGA')
            );
            
            $this->Reparaciones_model->insert($data);
            redirect('reparaciones/index');
        }
        else
        {            
			$data['lista_estados'] = $this->Estados_model->getAll();
            $data['_view'] = 'reparaciones/nuevo';
			$this->load->view('layouts/main',$data);
        }
    }  
	
	function eliminar($id)
    {
        $data = $this->Reparaciones_model->getById($id);

        if(isset($data['NRO_ORDEN']))
        {
            $this->Reparaciones_model->delete($id);
            redirect('reparaciones/index');
        }
        else
            show_error('La reparación no existe.');
    }
	
	function editar($id)
    {   
        $data['reparacion'] = $this->Reparaciones_model->getById($id);
        
        if(isset($data['reparacion']['NRO_ORDEN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $data = array(
					'ESTADO_REPARACION' => $this->input->post('ESTADO_REPARACION'),
					'FALLA' => $this->input->post('FALLA'),
					'OBSERVACIONES' => $this->input->post('OBSERVACIONES'),
					'FECHA_ENTREGA' => $this->input->post('FECHA_ENTREGA')
                );

                $this->Reparaciones_model->update($id,$data);            
                redirect('reparaciones/index');
            }
            else
            {
				$data['lista_estados'] = $this->Estados_model->getAll();
				
				$data['lista_componentes_no_usados'] = $this->Reparaciones_model->getComponentesNoUsados($id);
				$data['lista_componentes_usados'] = $this->Reparaciones_model->getComponentesUsados($id);
				
				$data['lista_tecnicos_no_usados'] = $this->Reparaciones_model->getTecnicosNoUsados($id);
				$data['lista_tecnicos_usados'] = $this->Reparaciones_model->getTecnicosUsados($id);
				
				$data['gasto'] = $this->Reparaciones_model->getGasto($id);
                $data['_view'] = 'reparaciones/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La reparación no existe');
    }

	public function agregar_componente($id)
    {   
		$data['reparacion'] = $this->Reparaciones_model->getById($id);
		
		if(isset($data['reparacion']['NRO_ORDEN']))
        {
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$data = array(
					'NRO_ORDEN' => $data['reparacion']['NRO_ORDEN'],
					'ID_COMPONENTE' => $this->input->post('ID_COMPONENTE'),
					'CANTIDAD' => $this->input->post('CANTIDAD')
				);
				
				$this->Reparaciones_model->insertComponente($data);
				
				redirect('reparaciones/editar/'.$id);

			}
			else
			{   
				redirect('reparaciones/editar/'.$id);
			}
		}
		else
			show_error('La reparacion no existe');
    }

	public function remover_componente($idreparacion,$idcomponente)
	{
		$this->Reparaciones_model->removeComponente($idreparacion,$idcomponente);
		redirect('reparaciones/editar/'.$idreparacion);
	}
	
	public function imprimir($id = NULL)
	{
		if($id == NULL){
			$data['lista_reparaciones'] = $this->Reparaciones_model->getAll();		
					
			$data['_view'] = 'reparaciones/reporte';
			
			$this->load->view('layouts/reporte',$data);
		}
		else{
			 $data['reparacion'] = $this->Reparaciones_model->getById($id);
        
			if(isset($data['reparacion']['NRO_ORDEN']))
			{
			
				$data['lista_estados'] = $this->Estados_model->getAll();
				
				$data['lista_componentes_no_usados'] = $this->Reparaciones_model->getComponentesNoUsados($id);
				$data['lista_componentes_usados'] = $this->Reparaciones_model->getComponentesUsados($id);
				
				$data['lista_tecnicos_no_usados'] = $this->Reparaciones_model->getTecnicosNoUsados($id);
				$data['lista_tecnicos_usados'] = $this->Reparaciones_model->getTecnicosUsados($id);
				
				$data['gasto'] = $this->Reparaciones_model->getGasto($id);
				
				$data['_view'] = 'reparaciones/presupuesto';
				$this->load->view('layouts/reporte',$data);
			
			}
		
		}
	}
	
	public function agregar_tecnico($id)
    {   
		$data['reparacion'] = $this->Reparaciones_model->getById($id);
		
		if(isset($data['reparacion']['NRO_ORDEN']))
        {
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$data = array(
					'NRO_ORDEN_REPARACION' => $data['reparacion']['NRO_ORDEN'],
					'LEGAJO_TECNICO' => $this->input->post('LEGAJO_TECNICO'),
				);
				
				$this->Reparaciones_model->insertTecnico($data);
				
				redirect('reparaciones/editar/'.$id);

			}
			else
			{   
				redirect('reparaciones/editar/'.$id);
			}
		}
		else
			show_error('La reparacion no existe');
    }

	public function remover_tecnico($idreparacion,$legajo)
	{
		$this->Reparaciones_model->removeTecnico($idreparacion,$legajo);
		redirect('reparaciones/editar/'.$idreparacion);
	}
	
}