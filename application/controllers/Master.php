<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct(){
    
      parent::__construct(); 
      //$this->load->helper('text'); 

    }

     
    public function index($categoria_meta_link = null ){
      if(!$categoria_meta_link || !$master= $this->core_model->get_by_id('categorias',array('categoria_meta_link' => $categoria_meta_link))){
        
        redirect('/'); 

      }else{

        $this->load->library('Pagination_Bootstrap');
        

        $data = array(

          'titulo' => 'Post da categoria'.$master->categoria_nome,
          'categoria' => $master->categoria_nome, 
          'post'=>$this->post_model->get_all_by(array('categoria_meta_link' => $categoria_meta_link)), 


          //'post_argumento' => $this->post_model->get_by_argumento_id($categoria_meta_link),
      ); 
        
       

       //$sql = $this->post_model->get_qtd_post(array('categoria_meta_link' => $categoria_meta_link));

       //$this->pagination_bootstrap->offset(10);  

       //$data['result'] = $this->pagination_bootstrap->config("master/index", $sql);
        
       
        //echo '<pre>'; 
        //print_r($sql); 
        //exit(); 

        $this->load->view('web/layout/header',$data);
        $this->load->view('web/master');
        $this->load->view('web/layout/footer');

      }


    }

    
    /*
    public function index(){

      $this->load->library('Pagination_Bootstrap');
      
      $this->load->model('Post_model','p'); $config['base_url'] = "http://localhost/sisec/master/";
      
      $config['uri_segement'] = 3;
      
      $config['per_page'] = 3;
      
      //Pagination Style
      
      $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';  
      $config['full_tag_close'] = '</ul></nav></div>';   
      $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';  
      $config['num_tag_close'] = '</span></li>';  
      $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';    
      $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';     
      $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';      
      $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
      
      // $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['prev_tag_close'] = '</span></li>';
      $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['first_tag_close'] = '</span></li>';
      $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['last_tag_close'] = '</span></li>';
      $page = $this->uri->segment(3,0);
      
    
      
  
      
      $data['art'] = $this->p->get_post_torah_all($config['per_page'], $page);  
      $config['total_rows'] = $this->p->get_qtd_post();    
      $this->pagination->initialize($config);    
      $data['pagination'] = $this->pagination->create_links();
      


      $this->load->view('web/layout/header',$data);
      $this->load->view('web/master');
      $this->load->view('web/layout/footer');
      
      }
 */
}