<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artigo extends CI_Controller {

    public function __construct(){
    
      parent::__construct(); 
      //$this->load->helper('text'); 

    }

    public function index($post_meta_link = null ){
      if(!$post_meta_link || !$post = $this->post_model->get_by_id($post_meta_link)){
        
        redirect('/'); 

      }else{

        $data = array(

          'titulo' => 'Artigo escolhido',

          'post'=>$post,

          'scripts' => array(
              //È para baixar o arquivo SweetAlert
              
              'mask/jquery.mask.min.js',
              'mask/custom.js',
              //'js/add_produto.js',
          ),

          'post_festa' =>$this->post_model->get_post_festa(),
          
      ); 

        $data['fotos_produtos'] = $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $post->post_id));
        
        //echo '<pre>'; 
        //print_r($data); 
        //exit(); 

        $this->load->view('web/layout/header',$data);
        $this->load->view('web/artigo');
        $this->load->view('web/layout/footer');

      }


    }




    


}