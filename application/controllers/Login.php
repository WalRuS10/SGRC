<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleados_model');
	}
	public function index()
	{
		if($this->session->has_userdata('NOMBRE')){
			redirect('empleados/index');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == false){				
			$data['_view'] = 'login/index';
			$this->load->view('layouts/login',$data);
		}
		else{
			$user = $this->input->post('nombre');
			$pass = $this->input->post('password');
			
			$user = $this->Empleados_model->checkLogin($user, $pass);
			
			if($user){
				$this->session->set_userdata($user);
				redirect('empleados/index');
			}else{
				
				$data['errorMessage'] = "Usuario o password erroneos";	
				$data['_view'] = 'login/index';
				$this->load->view('layouts/login',$data);
			}
		}
	}
	
}