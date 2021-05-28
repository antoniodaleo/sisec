<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
    
        //Esiste uma sessao
	
	}


	public function index(){
		
			$this->form_validation->set_rules('email_descricao','email','trim|required|min_length[10]|max_length[100]|valid_email|callback_valida_email'); 

			if($this->form_validation->run()){
				$data = elements(
					array(
						'email_descricao',
						
		
					),$this->input->post()
				);

				$data = html_escape($data); 
				$this->core_model->insert('email',$data);
				$this->form_validation->set_message('valida_email','Email cadastrada com sucesso');
				redirect('/');
			}else{

				redirect('/');

			}

	}


	public function valida_email($email){
        //cadastrando
        if($this->core_model->get_by_id('email', array('email_descricao' =>$email ))){
            $this->form_validation->set_message('valida_email','Esse email já existe');
            return false; 
        }else{

			$this->form_validation->set_message('valida_email','Email cadastrada com sucesso');
            return true;          
        }

    }




}
	
