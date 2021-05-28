<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		 parent::__construct(); 
    
         if(!$this->ion_auth->logged_in()){
             redirect('restrito/login'); 
         }
        //Esiste uma sessa
    }


    public function index(){
        $data = array(

            'titulo' => 'Categorias pai cadastradas',

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
            
            'master' => $this->core_model->get_all('categorias_pai'),

        ); 

         //echo  '<pre>'; 
        // print_r($data); 
        //exit(); 
	
		$this->load->view('restrito/layout/header',  $data);
		$this->load->view('restrito/master/index');
		$this->load->view('restrito/layout/footer');


    }

    public function core($categoria_pai_id=null){

        $categoria_pai_id = (int) $categoria_pai_id; 

        if(!$categoria_pai_id){
            //Cadastrar
            $this->form_validation->set_rules('categoria_pai_nome','Nome da categoria pai','trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');
            
            if($this->form_validation->run()){ 
                
                $data = elements(
                    array(
                        'categoria_pai_nome',
                        'categoria_pai_ativa',
                    ), $this->input->post()
                );

                //Definindo om metelink
                $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']); 

                $data = html_escape($data); 
                $this->core_model->insert('categorias_pai', $data);
                redirect('restrito/master'); 

            }else{

                $data = array(

                    'titulo' => 'Cadastrar Categorias pai ',

        
                ); 

                //echo  '<pre>'; 
                //print_r($data['master']); 
                //exit(); 

                $this->load->view('restrito/layout/header',  $data);
                $this->load->view('restrito/master/core');
                $this->load->view('restrito/layout/footer');
            }

        }else{
            //Editiamo

            if(!$master = $this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))){

                $this->session->set_flashdata('erro', 'A categoria pai não foi encontrada'); 
                redirect('restrito/master');

            }else{
                //editando
                $this->form_validation->set_rules('categoria_pai_nome','Nome da categoria pai','trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');
            
                if($this->form_validation->run()){ 
                    
                    if($this->input->post('categoria_pai_ativa') == 0 ){

                        if($this->core_model->get_by_id('categorias', array('categoria_pai_id' => $categoria_pai_id) )){

                            $this->session->set_flashdata('erro', 'Essa categoria pai não pode ser desativada'); 
                            redirect('restrito/master');

                        }
                    }

                    $data = elements(
                        array(
                            'categoria_pai_nome',
                            'categoria_pai_ativa',
                        ), $this->input->post()
                    );

                    //echo  '<pre>'; 
                    //print_r( $this->input->post()); 
                    //exit(); 
                    
                    //Definindo om metelink
                    $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']); 

                    $data = html_escape($data); 
                    $this->core_model->update('categorias_pai', $data, array('categoria_pai_id' => $categoria_pai_id));
                    redirect('restrito/master'); 

                }else{

                    $data = array(

                        'titulo' => 'Editar Categorias pai ',
                        'master' => $master,
            
                    ); 

                    //echo  '<pre>'; 
                    //print_r($data['master']); 
                    //exit(); 

                    $this->load->view('restrito/layout/header',  $data);
                    $this->load->view('restrito/master/core');
                    $this->load->view('restrito/layout/footer');
                }
            }
        }
    }

    
    public function valida_nome_categoria($categoria_pai_nome){

        $categoria_pai_id = $this->input->post('categoria_pai_id');
        //echo  '<pre>'; 
        //print_r( $categoria_pai_nome); 
       // exit(); 

        if(!$categoria_pai_id){
            //cadastrando
            if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome))){
                $this->form_validation->set_message('valida_nome_categoria', 'Essa cate. pai já existe'); 
                return false; 
            }else{
                return true;
            }
        }else{
            //Editando
            if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome , 'categoria_pai_id !=' => $categoria_pai_id))){
                $this->form_validation->set_message('valida_nome_categoria', 'Essa categoia pai já existe'); 
                return false; 
            }else{
                return true;
            }


        }

    }

    public function delete($categoria_pai_id = null){

        $categoria_pai_id = (int) $categoria_pai_id; 

        if(!$categoria_pai_id || !$this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))){
            $this->session->set_flashdata('erro','A categoria não foi encontrada'); 
            redirect('restrito/master');
        }

        if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id, 'categoria_pai_ativa'=> 1))){
            $this->session->set_flashdata('erro','Não é possivel excluir uma categoria ativa'); 
            redirect('restrito/master');
        }

        $this->core_model->delete('categorias_pai', array('categoria_pai_id' => $categoria_pai_id)); 
        redirect('restrito/master'); 

    }



}