<?php
class Cuenta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleados_model');
	}
	
	public function index(){
		redirect('cuenta/login');
	}
	public function login()
	{
		if($this->session->has_userdata('NOMBRE')){
			redirect('home/index');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == false){				
			$data['_view'] = 'cuenta/login';
			$this->load->view('layouts/login',$data);
		}
		else{
			$user = $this->input->post('nombre');
			$pass = $this->input->post('password');
			
			$user = $this->Empleados_model->checkLogin($user, $pass);
			
			if($user){
				$this->session->set_userdata($user);
				redirect('home/index');
			}else{
				
				$data['errorMessage'] = "Usuario o password erroneos";	
				$data['_view'] = 'cuenta/login';
				$this->load->view('layouts/login',$data);
			}
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('NOMBRE');
        redirect('cuenta/login');
	}
	
	public function configuracion()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('oldpassword', 'Password Actual', 'required');
		$this->form_validation->set_rules('newpassword', 'Password Nuevo', 'required');
		$this->form_validation->set_rules('newpasswordr', 'Confirmar Password', 'required|matches[newpassword]');
		
		
		if($this->form_validation->run() == false){				
			$data['_view'] = 'cuenta/configuracion';
			$this->load->view('layouts/login',$data);
		}
		else{
			if($this->input->post('oldpassword') != $_SESSION['PASSWORD']){
				$data['_view'] = 'cuenta/configuracion';
				$data['errorMessage'] = 'El password actual es incorrecto';
				$this->load->view('layouts/login',$data);
			}
			else{	
				$this->Empleados_model->changePassword($_SESSION['LEGAJO'],$this->input->post('newpassword'));
				redirect('home');
			}
		}
	}
	
}