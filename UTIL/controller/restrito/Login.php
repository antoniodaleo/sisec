<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
    
        //Esiste uma sessao
	
	}


	public function index(){
		$data = array(
			'titulo' => 'Login na area restrita', 
		);

		$this->load->view('restrito/layout/header',  $data);
		$this->load->view('restrito/login/index');
		$this->load->view('restrito/layout/footer');

	}


	public function auth(){
		$identity = $this->input->post('email'); 
		$password = $this->input->post('password'); 
		$remember = ($this->input->post('remember' ? TRUE:FALSE));

		if($this->ion_auth->login($identity , $password , $remember)){
			$this->session->set_flashdata('sucesso', 'Seja muito bem vindo'); 
			redirect('restrito/home'); 
		}else{
			$this->session->set_flashdata('erro', 'Por favor verifique suas credenciais de acesso');
			redirect('restrito/login'); 
		}

	}

	public function logout(){
		$this->ion_auth->logout(); 
	}
}