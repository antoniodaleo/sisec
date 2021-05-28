<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    public function __construct(){
    
      parent::__construct(); 
      //$this->load->helper('text'); 

    }

    public function index($produto_meta_link = null ){
      if(!$produto_meta_link || !$produto = $this->produtos_model->get_by_id($produto_meta_link)){
        
        redirect('/'); 

      }else{

        $data = array(

          'titulo' => 'Cadastrar produtos',

          'produto'=>$produto,

          'scripts' => array(
              //È para baixar o arquivo SweetAlert
              
              'mask/jquery.mask.min.js',
              'mask/custom.js',
              'js/add_produto.js',
          ),
          
      ); 

        $data['fotos_produtos'] = $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $produto->produto_id));
        
        //echo '<pre>'; 
        //print_r($data); 
        //exit(); 

        $this->load->view('web/layout/header',$data);
        $this->load->view('web/produto');
        $this->load->view('web/layout/footer');

      }


    }


    


}