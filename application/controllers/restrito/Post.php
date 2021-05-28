<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
    
        //Esiste uma sessao
        if(!$this->ion_auth->logged_in()){
            redirect('restrito/login'); 
        }
    }
    

    public function index(){
        $data = array(

            'titulo' => 'Post cadastrados',

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
            
            'posts' => $this->post_model->get_all('post'),

        ); 

            //echo '<pre>';
            //print_r($data['produtos']); 
            //exit();

            $this->load->view('restrito/layout/header',  $data);
            $this->load->view('restrito/post/index');
            $this->load->view('restrito/layout/footer');
    }

    public function core($post_id = null){
        
        $post_id = (int) $post_id;

        if(!$post_id){
        // CADASTRANDO --------------------------------
        $this->form_validation->set_rules('post_titulo','Titulo do post','trim|required|min_length[4]|max_length[250]|callback_valida_nome_post');
        $this->form_validation->set_rules('post_categoria_id','Categoria do post','trim|required');
        $this->form_validation->set_rules('post_descricao','Descrição do post','trim|required|min_length[10]|max_length[5000]');
        $this->form_validation->set_rules('post_body','Conteudo do post','trim|required|min_length[100]');
        $this->form_validation->set_rules('post_data','Data do post','trim|required');
            


        $fotos_produtos = $this->input->post('fotos_produtos'); 

        if(!$fotos_produtos){
            $this->form_validation->set_rules('fotos_produtos','Imagens do post','trim|required');
        }

        if($this->form_validation->run()){
                
           

            $data = elements(
                array(
                    'post_titulo',
                    'post_categoria_id',
                    'post_destaque',
                    'post_descricao', 
                    'post_body',
                    'post_frame',
                    'post_data',
                    'post_ativo',
                    
                    
                ), $this->input->post()
            );

            //Remove a virgula do valor
            //$data['produto_valor'] = str_replace(',','',$data['produto_valor']);

            //Criando o metalink do produto
            $data['post_meta_link'] = url_amigavel($data['post_titulo']);


            $data = html_escape($data); 

            //echo '<pre>'; 
            //print_r($data); 
            //exit(); 

            $this->core_model->insert('post', $data, true); 


            //Recupera ultimo id inserido
            $post_id = $this->session->userdata('last_id'); 
            //$fotos_produtos = $this->input->post('fotos_produtos'); 
            
            //echo '<pre>'; 
            //print_r($this->input->post()); 
            //exit(); 

            if($fotos_produtos){
                
                $total_fotos = count($fotos_produtos); 

                for($i = 0; $i< $total_fotos; $i++){
                    $data = array(
                        'foto_produto_id' => $post_id,  
                        'foto_caminho' => $fotos_produtos[$i],
                    );

                    //echo '<pre>'; 
                    //print_r($data['foto_caminho']); 
                   // exit(); 
                    $this->core_model->insert('produtos_fotos', $data);
                }
       
            }

            redirect('restrito/post');

        }else{

            $data = array(

                'titulo' => 'Cadastrar post',
    
                'styles' => array(
                    'jquery-upload-file/css/uploadfile.css',
                    'jquery-upload-file/css/uploadfile.custom.css',
                    
                ),
    
                'scripts' => array(
                    //È para baixar o arquivo SweetAlert
                    'sweetalert2/sweetalert2.all.min.js',
                    'jquery-upload-file/js/jquery.uploadfile.min.js',
                    'jquery-upload-file/js/produtos.js',
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                
                'categorias' =>  $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
            ); 
        
                $this->load->view('restrito/layout/header',  $data);
                $this->load->view('restrito/post/core');
                $this->load->view('restrito/layout/footer');
    
        }



        }else{
        // EDITANDO -----------------------------------
            if( !$post = $this->core_model->get_by_id('post', array('post_id' =>$post_id))){
                //Verifichiamo se il produto esiste
                $this->session->set_flash_data('erro', 'Esse post não foi encontrado');
                redirect('restrito/post'); 
            }else{
                //Iniziamo l' edizione dei prodotti

                $this->form_validation->set_rules('post_titulo','Titulo do post','trim|required|min_length[4]|max_length[250]|callback_valida_nome_post');
                $this->form_validation->set_rules('post_categoria_id','Categoria do post','trim|required');
                $this->form_validation->set_rules('post_descricao','Descrição do post','trim|required|min_length[10]|max_length[5000]');
                $this->form_validation->set_rules('post_body','Conteudo do post','trim|required|min_length[100]');
                $this->form_validation->set_rules('post_data','Data do post','trim|required');
        
            

                if($this->form_validation->run()){


                    //echo '<pre>'; 
                    //print_r($this->input->post()); 
                    //exit(); 


                    $data = elements(
                        array(
                            'post_titulo',
                            'post_categoria_id',
                            'post_destaque',
                            'post_descricao', 
                            'post_body',
                            'post_frame',
                            'post_data',
                            'post_ativo',
                        ), $this->input->post()
                    );

                    //Remove a virgula do valor
                    //$data['produto_valor'] = str_replace(',','',$data['produto_valor']);

                    //Criando o metalink do produto
                    $data['post_meta_link'] = url_amigavel($data['post_titulo']);

                    $data = html_escape($data); 

                    

                    $this->core_model->update('post', $data, array('post_id' => $post_id)); 


                   

                    //Exclui as imagem antigas
                    $this->core_model->delete('produtos_fotos', array('foto_produto_id' => $post_id));

                    $fotos_produtos = $this->input->post('fotos_produtos');

                    if($fotos_produtos){
                        
                        $total_fotos = count($fotos_produtos); 
    
                        for($i = 0; $i< $total_fotos; $i++){
                            $data = array(
                                'foto_produto_id' => $post_id,  
                                'foto_caminho' => $fotos_produtos[$i],
    
                            );
    
                            $this->core_model->insert('produtos_fotos', $data);
                    }
               
                    }

                    redirect('restrito/post');

                }else{

                    $data = array(

                        'titulo' => 'Editar post',
            
                        'styles' => array(
                            'jquery-upload-file/css/uploadfile.css',
                            'jquery-upload-file/css/uploadfile.custom.css',
                        ),
            
                        'scripts' => array(
                            //È para baixar o arquivo SweetAlert
                            'sweetalert2/sweetalert2.all.min.js',
                            'jquery-upload-file/js/jquery.uploadfile.min.js',
                            'jquery-upload-file/js/produtos.js',
                            'mask/jquery.mask.min.js',
                            'mask/custom.js',
                        ),
                        
                        'post' => $post,
                        'fotos_produto' => $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $post_id)),
                        'categorias' =>  $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
                        //'marcas' =>  $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
    
                    ); 
            
                        //echo '<pre>';
                        //print_r($data['post']); 
                        //exit();
            
            
                        $this->load->view('restrito/layout/header',  $data);
                        $this->load->view('restrito/post/core');
                        $this->load->view('restrito/layout/footer');
            
                }


            }

        }
        
    }

    public function valida_nome_post($post_titulo){ 
        $post_id = $this->input->post('post_id');
        //echo  '<pre>'; 
        //print_r( $categoria_pai_nome); 
       // exit(); 

        if(!$post_id){
            //cadastrando
            if($this->core_model->get_by_id('post', array('post_titulo' => $post_titulo))){
                $this->form_validation->set_message('valida_post_titulo', 'Essa post já existe'); 
                return false; 
            }else{
                return true;
            }
        }else{
            //Editando
            if($this->core_model->get_by_id('post', array('post_titulo' => $post_titulo , 'post_id !=' => $post_id))){
                $this->form_validation->set_message('valida_post_titulo', 'Esse post já existe'); 
                return false; 
            }else{
                return true;
            }


        }


    }

    public function upload(){

        $config['upload_path'] ='./uploads/produtos/'; 
        $config['allowed_types'] ='jpg|png|jpeg'; 
        $config['max_size'] = 2048;  // Max 2Mb
        $config['max_width'] = 1000; 
        $config['max_height'] = 1000; 
        $config['max_filename'] = 200; 
        $config['encrypt_name'] = true; 
        $config['file_ext_tolower'] = true; 


        $this->load->library('upload', $config); 


        if($this->upload->do_upload('foto_produto')){

            $data = array(
                'uploaded_data' => $this->upload->data(), 
                'mensagem' =>'imagem enviada com sucesso',
                'foto_caminho' => $this->upload->data('file_name'),
                'erro'=> 0,
            );

            //Resize image configuration
            $config['image_library'] = 'gd2';  // Max 2Mb
            $config['source_image'] ='./uploads/produtos/'.$this->upload->data('file_name'); 
            $config['new_image'] = './uploads/produtos/small/'.$this->upload->data('file_name'); 
            $config['width'] = 300; 
            $config['height'] = 300; 

            //Chama a biblioteca
            $this->load->library('image_lib', $config); 

            //Faz o resize
            //$this->image_lib->resize(); 

            if(!$this->image_lib->resize()){
                
                $data['erro'] = $this->image_lib->display_errors(); 
            
            }

        }else{
            $data = array(
                'mensagem' => $this->upload->display_errors(), 
                'erro' => 5, 
            );
        }

        echo json_encode($data); 

    }

    public function delete($post_id = null){
        $post_id = (int) $post_id; 
        if(!$post_id || !$this->core_model->get_by_id('post', array('post_id' => $post_id))){
            $this->session->set_flashdata('erro', 'Esse post não foi encontrado'); 
            redirect('restrito/post');
        }

        if($this->core_model->get_by_id('post', array('post_id' => $post_id , 'post_ativo' => 1))){
            $this->session->set_flashdata('erro','Esse post não pode ser deletado porque é ativo');
            redirect('restrito/post');
        }

             
         

        //Recupera le foto
        $fotos_produtos = $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $post_id));
        $this->core_model->delete('post', array('post_id' => $post_id));


        //Elimini le foto
        if($fotos_produtos){
            foreach($fotos_produtos as $foto){

                $foto_grande = FCPATH.'uploads/produtos/'.$foto->foto_caminho;
                $foto_pequena = FCPATH.'uploads/produtos/small'.$foto->foto_caminho;

                if(file_exists($foto_grande) && file_exists($foto_pequena) ){
                    unlink($foto_grande); 
                    unlink($foto_pequena); 
                }
            }
        }
        redirect('restrito/post');
    }


}