<?php
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* Aca se cargan modulos, helpers, etc... si se usa en muchos controladores, 
			dejarlo fijo en /config/autoload.php */
		$this->load->model('Reparaciones_model');
		$this->load->model('Estados_model');
		$this->load->model('Componentes_model');
		$this->load->model('Clientes_model');
		$this->load->model('Empleados_model');
		$this->load->library('session');
		
		if(!$this->session->has_userdata('NOMBRE')){ // TODO: se podria mejorar...
			redirect('cuenta/logout');
		}
	}
	public function index()
	{
		
		$data['_view'] = 'home/index';
		
		$this->load->view('layouts/home',$data);
			
	}
	

	
}