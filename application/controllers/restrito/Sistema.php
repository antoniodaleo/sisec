<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct(){
		 parent::__construct(); 
    
         if(!$this->ion_auth->logged_in()){
             redirect('restrito/login'); 
         }
        //Esiste uma sessa
    }

    public function index(){

        $this->form_validation->set_rules('sistema_razao_social', 'Razão Social','trim|required|min_length[10]|max_length[145]'); 
        $this->form_validation->set_rules('sistema_nome_fantasia', '','trim|required|min_length[10]|max_length[145]'); 
        $this->form_validation->set_rules('sistema_cnpj', '','trim|required|exact_length[18]');  
        $this->form_validation->set_rules('sistema_ie', '','trim|required|max_length[25]'); 
        
        $this->form_validation->set_rules('sistema_telefone_fixo', '','trim|required|max_length[25]'); 
        $this->form_validation->set_rules('sistema_telefone_movel', '','trim|required|max_length[25]'); 
        $this->form_validation->set_rules('sistema_email', '','trim|required|valid_email|max_length[100]'); 
        $this->form_validation->set_rules('sistema_site_url', 'URL do Site','trim|required|valid_url|max_length[100]'); 
        
        $this->form_validation->set_rules('sistema_cep', 'Cep','trim|required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', 'Endereço','trim|required|max_length[145]');  
        $this->form_validation->set_rules('sistema_numero', 'Numero','trim|required|max_length[25]');  
        $this->form_validation->set_rules('sistema_cidade', 'Cidade','trim|required|max_length[45]');  
        
        $this->form_validation->set_rules('sistema_estado', 'Estado','trim|required|exact_length[2]');
        $this->form_validation->set_rules('sistema_produtos_destaques', 'Quantidade produtos destaque','trim|required|integer');

        if($this->form_validation->run()){

            $data = elements(
                array(
                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_email',
                    'sistema_site_url',
                    'sistema_cep',
                    'sistema_endereco',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_produtos_destaques',

                ),$this->input->post()

            );

             
            $data = html_escape($data); 

            $this->core_model->update('sistema', $data, array('sistema_id' =>1)); 

            redirect('restrito/sistema');

       
       
        }else{
            $data = array(
                'titulo' => 'Informações da Loja', 
    
                'script' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ) ,
                
                'sistema' =>  $this->core_model->get_by_id('sistema', array('sistema_id'=>1)), 
            );
    

            $this->load->view('restrito/layout/header',  $data);
            $this->load->view('restrito/sistema/index');
            $this->load->view('restrito/layout/footer');
        }
    }
    
    public function correios(){

        $this->form_validation->set_rules('config_cep_origem', 'Cep de origem','trim|required|exact_length[9]');
        $this->form_validation->set_rules('config_codigo_pac', 'Codigo serviço pac','trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_codigo_sedex', 'Codigo serviço sedex','trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_somar_frete', 'Somar ao frete','trim|required');
        $this->form_validation->set_rules('config_valor_declarado', 'Valor declarado','trim|required');
        

        if($this->form_validation->run()){

            $data = elements(
                array(
                    'config_cep_origem',
                    'config_codigo_pac',
                    'config_codigo_sedex',
                    'config_somar_frete',
                    'config_valor_declarado',

        
                ),$this->input->post()

            );

            $data['config_somar_frete'] = str_replace(',','',$data['config_somar_frete']);
            $data['config_valor_declarado'] = str_replace(',','',$data['config_valor_declarado']);
            
            
            $data = html_escape($data); 

            $this->core_model->update('config_correios', $data, array('config_id' =>1)); 

            redirect('restrito/sistema/correios');

       
       
        }else{
            $data = array(
                'titulo' => 'Editar informações do correio', 
    
                'script' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ) ,
                
                'correio' =>  $this->core_model->get_by_id('config_correios', array('config_id'=>1)), 
            );
    

            $this->load->view('restrito/layout/header',  $data);
            $this->load->view('restrito/sistema/correios');
            $this->load->view('restrito/layout/footer');
        }
    }


}