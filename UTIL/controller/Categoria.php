<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct(){
    
      parent::__construct(); 
      //$this->load->helper('text'); 

    }

    public function index($categoria_meta_link = null ){
      if(!$categoria_meta_link || !$categoria= $this->core_model->get_by_id('categorias',array('categoria_meta_link' => $categoria_meta_link))){
        
        redirect('/'); 

      }else{

        $data = array(

          'titulo' => 'Produtos da categoria'.$categoria->categoria_nome,
          'categoria' => $categoria->categoria_nome, 
          'produto'=>$this->produtos_model->get_all_by(array('categoria_meta_link' => $categoria_meta_link)), 
      ); 

        foreach ($data['produto'] as $produto){

          $data['categoria_pai_nome'] = $produto->categoria_pai_nome; 
          $data['categoria_pai_meta_link'] = $produto->categoria_pai_meta_link; 

        }  

        //echo '<pre>'; 
        //print_r($data); 
        //exit(); 

        $this->load->view('web/layout/header',$data);
        $this->load->view('web/categoria');
        $this->load->view('web/layout/footer');

      }


    }


    


}