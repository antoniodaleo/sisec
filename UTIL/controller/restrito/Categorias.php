<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
    
        //Esiste uma sessao
	
    }
    

    public function index(){
        $data = array(

            'titulo' => 'Categorias cadastradas',

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
            
            'categorias' => $this->core_model->get_all('categorias'),

        ); 

            $this->load->view('restrito/layout/header',  $data);
            $this->load->view('restrito/categorias/index');
            $this->load->view('restrito/layout/footer');
    }

    public function core($categoria_id=null){

        $categoria_id = (int) $categoria_id; 

        if(!$categoria_id){
            //Cadastrar
            $this->form_validation->set_rules('categoria_nome','Nome da categoria','trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');
            
            if($this->form_validation->run()){ 
                
                $data = elements(
                    array(
                        'categoria_nome',
                        'categoria_ativa',
                        'categoria_pai_id', 
                    ), $this->input->post()
                );

                //Definindo om metelink
                $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']); 

                $data = html_escape($data); 
                $this->core_model->insert('categorias', $data);
                redirect('restrito/categorias'); 

            }else{

                $data = array(

                    'titulo' => 'Cadastrar Categorias',
                    'masters' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' =>1)),

                ); 

                //echo  '<pre>'; 
                //print_r($data['master']); 
                //exit(); 

                $this->load->view('restrito/layout/header',  $data);
                $this->load->view('restrito/categorias/core');
                $this->load->view('restrito/layout/footer');
            }

        }else{
            //Editiamo

            if(!$categoria = $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){

                $this->session->set_flashdata('erro', 'A categoria n??o foi encontrada'); 
                redirect('restrito/categorias');

            }else{
                //editando
                $this->form_validation->set_rules('categoria_nome','Nome da categoria ','trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');
            
                if($this->form_validation->run()){ 
                    
                    $data = elements(
                        array(
                            'categoria_nome',
                            'categoria_ativa',
                            'categoria_pai_id',

                        ), $this->input->post()
                    );

                    //echo  '<pre>'; 
                    //print_r( $this->input->post()); 
                    //exit(); 
                    
                    //Definindo om metelink
                    $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']); 

                    $data = html_escape($data); 
                    $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
                    redirect('restrito/categorias'); 

                }else{

                    $data = array(

                        'titulo' => 'Editar Categoria ',
                        'categoria' => $categoria,
                        'masters' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' =>1)),
                    ); 

                    //echo  '<pre>'; 
                    //print_r($data['master']); 
                    //exit(); 

                    $this->load->view('restrito/layout/header',  $data);
                    $this->load->view('restrito/categorias/core');
                    $this->load->view('restrito/layout/footer');
                }
            }
        }
    }


    public function valida_nome_categoria($categoria_nome){

        $categoria_id = $this->input->post('categoria_id');
        //echo  '<pre>'; 
        //print_r( $categoria_pai_nome); 
       // exit(); 

        if(!$categoria_id){
            //cadastrando
            if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome))){
                $this->form_validation->set_message('valida_nome_categoria', 'Essa categoria. pai j?? existe'); 
                return false; 
            }else{
                return true;
            }
        }else{
            //Editando
            if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome , 'categoria_id !=' => $categoria_id))){
                $this->form_validation->set_message('valida_nome_categoria', 'Essa categoia pai j?? existe'); 
                return false; 
            }else{
                return true;
            }


        }

    }

    public function delete($categoria_id = null){

        $categoria_id = (int) $categoria_id; 

        if(!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
            $this->session->set_flashdata('erro','A categoria n??o foi encontrada'); 
            redirect('restrito/categorias');
        }

        if($this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id, 'categoria_ativa'=> 1))){
            $this->session->set_flashdata('erro','N??o ?? possivel excluir uma categoria ativa'); 
            redirect('restrito/categorias');
        }

        $this->core_model->delete('categorias', array('categoria_id' => $categoria_id)); 
        redirect('restrito/categorias'); 

    }









}