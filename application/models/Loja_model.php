<?php

    defined('BASEPATH') OR exit('Ação não permitida'); 

    class Loja_model extends CI_Model{

        public function get_grandes_marcas(){

            $this->db->select([
                'marcas.*',

            ]);

            $this->db->where('marca_ativa',1); 

            $this->db->join('produtos', 'produtos.produto_marca_id = marcas.marca_id','LEFT');

            $this->db->group_by('marca_nome');

            return $this->db->get('marcas')->result(); 

        }

        //Categorias pai navbar
        public function get_categorias(){
            $this->db->select([ 
                'categorias.*',

            ]);

            $this->db->where('categoria_ativa',1); 
            
            //Retorna apenas produtos com categ associadas
           // $this->db->join('categorias','categorias.categoria_pai_id = categorias_pai.categoria_pai_id','LEFT');

            $this->db->join('post','post.post_categoria_id = categorias.categoria_id','LEFT');

           $this->db->group_by('categorias.categoria_nome');

            return $this->db->get('categorias')->result();
        }
        
        //Categorias filhas
        public function get_categorias_filhas($categorias_id = null){
            $this->db->select([ 
                'sub_categorias.*',
                'post.post_titulo', 

            ]);

            $this->db->where('sub_categorias.categoria_sub_categoria_id', $categorias_id); 
            $this->db->where('sub_categorias.sub_categoria_ativa', 1); 
            
            //Retorna apenas post com categ associadas
            $this->db->join('post','post.post_categoria_id = sub_categorias.sub_categoria_id','LEFT');

            $this->db->group_by('sub_categorias.sub_categoria_nome');
            return $this->db->get('sub_categorias')->result();
        }

        public function get_post_destaques($num_post_destaques= null){
            $this->db->select([
                'post.post_id', 
                'post.post_nome', 
                'post.post_meta_link', 
                'post.foto_caminho', 
            ]);

            $this->db->join('produtos_fotos','produtos_fotos.foto_produto_id = post.post_id');

            $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);

            $this->db->limit($num_post_destaques);

            $this->db->group_by('post.post_id'); 

            return $this->db->get('post')->result(); 
        }

    }