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
            
            $empleado_id = $this->Reparaciones_model->insert($data);
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
				$data['lista_componentes'] = $this->Componentes_model->getAll();
				$data['lista_componentes_usados'] = $this->Reparaciones_model->getComponentes($id);
				$data['gasto'] = $this->Reparaciones_model->getGasto($id);
                $data['_view'] = 'reparaciones/editar';
				$this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La reparación no existe');
    }

	Public function nuevocomponente($id)
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
            
            $empleado_id = $this->Reparaciones_model->insertComponente($data);
			
			$data['lista_estados'] = $this->Estados_model->getAll();
			$data['lista_componentes'] = $this->Componentes_model->getAll();
			$data['lista_componentes_usados'] = $this->Reparaciones_model->getComponentes($id);
			$data['gasto'] = $this->Reparaciones_model->getGasto($id);
            redirect('reparaciones/editar/'.$id);

        }
        else
        {   
			$data['lista_estados'] = $this->Estados_model->getAll();
            $data['_view'] = 'reparaciones/editar';
			$this->load->view('layouts/main',$data);
			redirect('reparaciones/editar');
        }
		}
    } 
}