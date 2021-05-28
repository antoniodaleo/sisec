<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct(){
		 parent::__construct(); 
    
         if(!$this->ion_auth->logged_in()){
             redirect('restrito/login'); 
         }
        //Esiste uma sessa
    }


    public function index(){
        $data = array(

            'titulo' => 'Marcas cadastrados',

            'styles' => array(
                'bundles/datatables/datatables.min.css',
                'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',


            ),

            'scripts' => array(
                'bundles/datatables/datatables.min.js',
                'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
                'bundles/jquery-ui/jquery-ui.min.js',
                'js/page/datatables.js',
            ),
            
            'marcas' => $this->core_model->get_all('marcas'),

        ); 

        
	
		$this->load->view('restrito/layout/header',  $data);
		$this->load->view('restrito/marcas/index');
		$this->load->view('restrito/layout/footer');


    }

    public function core($marca_id = null){

        if(!$marca_id){
            //cadastra
            $this->form_validation->set_rules('marca_nome','Nome da marca','trim|required|min_length[2]|max_length[40]|callback_valida_nome'); 

                if($this->form_validation->run()){
                   
                    $data = elements(
                        array(
                            'marca_nome',
                            'marca_ativa',
                            
                        ),$this->input->post()
                    ); 


                    $data['marca_meta_link'] = url_amigavel($data['marca_nome']); 
                    $data = html_escape($data); 

                    $this->core_model->insert('marcas', $data);
                    redirect('restrito/marcas'); 

                }else{
                    //Erro de validacao
                    $data = array(
                        'titulo' => 'Cadastrar marca',
                        
                    ); 

                    $this->load->view('restrito/layout/header',  $data);
                    $this->load->view('restrito/marcas/core');
                    $this->load->view('restrito/layout/footer');

                }
        }else{

            
            if(!$marca = $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))){

                $this->session->set_flahdata('erro', 'A marca não foi encontrada'); 
                
                redirect('restrito/marcas'); 
            }else{
                

                $this->form_validation->set_rules('marca_nome','Nome da marca','trim|required|min_length[2]|max_length[40]'); 

                if($this->form_validation->run()){
                   
                    $data = elements(
                        array(
                            'marca_nome',
                            'marca_ativa',
                            
                        ),$this->input->post()
                    ); 
                    //echo  '<pre>'; 
                   // print_r($data); 
                    //exit(); 

                    $data['marca_meta_link'] = url_amigavel($data['marca_nome']); 
                    $data = html_escape($data); 

                    $this->core_model->update('marcas',$data, array('marca_id' =>$marca_id));
                    redirect('restrito/marcas'); 
                }else{

                    //Erro de validacao
                    $data = array(

                        'titulo' => 'Editar marca',
                        'marca' => $marca,
            
                    ); 
            
                    
                
                    $this->load->view('restrito/layout/header',  $data);
                    $this->load->view('restrito/marcas/core');
                    $this->load->view('restrito/layout/footer');
    

                }

        
            }

        }

    }

    public function valida_nome($marca_nome){

        $marca_id = $this->input->post('marca_id'); 

        if(!$marca_id){
            //cadastrando
            if($this->core_model->get_by_id('marcas', array('marca_nome' =>$marca_nome ))){
                $this->form_validation->set_message('valida_nome_marca','Esse nome de marca já existe');
                return false; 
            }else{
                return true;          
            }

        }else{
            //Editando
            if($this->core_model->get_by_id('marcas', array('marca_nome' =>$marca_nome, 'marca_id !=' => $marca_id ))){
                $this->form_validation->set_message('valida_nome_marca','Esse nome de marca já existe');
    
                return false; 
    
            }else{
    
                return true;          
            }

        }

        

    }


    public function delete($marca_id = null){

        $marca_id = (int) $marca_id; 
        if(!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))){
            $this->session->set_flashdata('erro','A marca não foi encontrada'); 
            redirect('restrito/marcas');
        }

        if($this->core_model->get_by_id('marcas', array('marca_id' => $marca_id, 'marca_ativa'=> 1))){
            $this->session->set_flashdata('erro','Não é possivel excluir uma marca ativa'); 
            redirect('restrito/marcas');
        }

        $this->core_model->delete('marcas', array('marca_id' => $marca_id)); 
        redirect('restrito/marcas'); 

    }


}