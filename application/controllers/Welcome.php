<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
    
      parent::__construct(); 
      $this->load->helper('text'); 

    }
    

    public function index(){

      $sistema = info_header_footer(); 

      $data = array(
        'titulo' => 'Seja muito bem vindo(a) á '.$sistema->sistema_nome_fantasia,
        'post_destaques' => $this->post_model->get_post_destaques(),
        'post_torah' => $this->post_model->get_post_torah(), 
        'post_kabalah' => $this->post_model->get_post_kabalah(),
        'post_judaismo' =>$this->post_model->get_post_judaismo(), 
        'post_receita' =>$this->post_model->get_post_receita(), 
        'post_festa' =>$this->post_model->get_post_festa(), 
        'post_salmo' =>$this->post_model->get_post_salmo(), 
      );

      //echo '<pre>';
      //print_r($data['produtos_destaques']);
      //exit();

      $this->load->view('web/layout/header',$data);
      $this->load->view('web/sisec');
      $this->load->view('web/layout/footer');
    }

}
