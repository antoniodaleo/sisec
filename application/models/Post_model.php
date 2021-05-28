<?php

    defined('BASEPATH') OR exit('Ação não permitida'); 

    class Post_model extends CI_Model{

        private $lastQuery=''; 

        public function get_all(){
            $this->db->select([
                'post.post_id', 
                'post.post_titulo', 
                'post.post_meta_link', 
                'post.post_ativo', 
                'categorias.categoria_id', 
                'categorias.categoria_nome', 
                
                

            ]);

            $this->db->join('categorias', 'categorias.categoria_id = post.post_categoria_id','LEFT');

            return $this->db->get('post')->result(); 

        }

        // Prendiamo dei post da metter in prima pagina
        public function get_post_destaques(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',

            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
            //$this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->order_by("post_id","desc");
            $this->db->limit(1); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 
            
        }

        // Prendiamo 3 post recenti di torah
        public function get_post_torah(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
           // $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);

            $this->db->limit(3); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 
        }

        // Prendiamo 1 post judaismo em destaque
        public function get_post_kabalah(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
           // $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);

            $this->db->limit(1); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 
        }

        // Prendiamo 2 post judaismo em destaque
        public function get_post_judaismo(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
           // $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);

            $this->db->limit(4); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 

        }

        // Prendiamo 2 post judaismo em destaque
        public function get_post_receita(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
          //  $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);

            $this->db->limit(2); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 

        }

        // Prendiamo 3 post festa judaica
        public function get_post_festa(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 

            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
            
           // $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);

            $this->db->limit(3); 
            $this->db->group_by('post.post_id');

            return $this->db->get('post')->result(); 
        }

        // Prendiamo 3 post festa judaica
        public function get_post_salmo(){
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                'produtos_fotos.foto_caminho',
            ]); 
        
            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
                    
           // $this->db->where('post.post_destaque',1);
            $this->db->where('post.post_ativo',1);
            $this->db->where('post.post_categoria_id',1);
        
            $this->db->limit(3); 
            $this->db->group_by('post.post_id');
        
            return $this->db->get('post')->result(); 
        }

        // Recupera o post para detalhalo    
        public function get_by_id($post_meta_link = null){
                $this->db->select([
                    'post.post_id',
                    'post.post_titulo',
                    'post.post_descricao',
                    'post.post_body',
                    'post.post_legenda',
                    'post.post_data',
                    'post.post_meta_link', 
                    'produtos_fotos.foto_caminho',

                    'sub_categorias.sub_categoria_id', 
                    'sub_categorias.sub_categoria_nome', 
                    //'sub_categorias.sub_categoria_meta_link', 


                ]);
    
    
                $this->db->where('post.post_meta_link', $post_meta_link);

                $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id');
                $this->db->join('sub_categorias', 'sub_categorias.sub_categoria_id = post.post_categoria_id','LEFT');
                
                return $this->db->get('post')->row(); 
        }
    
        //Retorna os produtos de acordo com a busca
        public function get_all_by_busca($busca = null){
    
            if($busca){
                $this->db->select([
                    'produtos.produto_nome', 
                    'produtos.produto_valor', 
                    'produtos.produto_meta_link',               
                    'categorias_pai.categoria_pai_nome',
                    'categorias.categoria_nome', 
                    'produtos_fotos.foto_caminho',
                ]);

                $this->db->where('produtos.produto_ativo', 1); 
                $this->db->like('produtos.produto_nome', $busca, 'BOTH');

                $this->db->join('marcas', 'marcas.marca_id =produtos.produto_marca_id', 'LEFT'); 
                $this->db->join('categorias', 'categorias.categoria_id =categorias.categoria_id' , 'LEFT'); 
                $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = produtos.produto_id', 'LEFT'); 
    
                $this->db->group_by('produtos.produto_id'); 

                return $this->db->get('produtos')->result();
                
            }else{

                return false;
            
            }


        }    


        public function get_all_by($condicoes = null ){
            
            $this->db->select([
                'post.post_id',
                'post.post_titulo',
                'post.post_descricao',
                'post.post_body',
                'post.post_legenda',
                'post.post_data',
                'post.post_meta_link', 
                    
                'categorias.categoria_nome',
                'categorias.categoria_meta_link',
     
                'produtos_fotos.foto_caminho',
            ]);
            //$this->db->limit($limit, $start); 

            $this->db->where('post.post_ativo', 1); 
    
            if($condicoes && is_array($condicoes)){
                $this->db->where($condicoes); 
            }

    
            $this->db->join('categorias', 'categorias.categoria_id =post.post_categoria_id', 'LEFT'); 
            $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = post.post_id', 'LEFT'); 
    
            //Retorna apenas uma foto 
            $this->db->group_by('post.post_id'); 

            return $this->db->get('post')->result();
    
        }
    

        // Post di Torah
        // Articoli di enfermagem sulla enfermagem_home 
        public function get_qtd_post(){
            $sql = explode('LIMIT',$this->lastQuery);
            $query =  $this->db->query($sql[0]);
            $this->db->where('categoria_id',1); 
            $result = $query->result(); 
            return count($result); 
            print_r($sql); exit; 
         }
        

         public function get_post_torah_all($limit, $start){
            $this->db->order_by('post_id', 'desc'); 
            $this->db->limit($limit, $start); 
            $this->db->where('post_categoria_id', 1); 
            $query = $this->db->get('post'); 
            $this->lastQuery = $this->db->last_query(); 
 
            if($query->num_rows()>0){
                return $query->result(); 
            }else{
                return false; 
            }
    
    
        }
        
    
    
    
    
    
    
    
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        

        