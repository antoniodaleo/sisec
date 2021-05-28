<?php

    defined('BASEPATH') OR exit('Ação não permitida'); 

    class Core_model extends CI_Model{
        
        public function get_all($tabela = NULL, $condicao = NULL){
            if($tabela){
                if(is_array($condicao)){
                    $this->db->where($condicao); 
                }
                return $this->db->get($tabela)->result();
            }else {
                return FALSE;
            }
        }

        public function get_by_id($tabela = NULL, $condicao = NULL){
            if($tabela && is_array($condicao)){
                $this->db->where($condicao); 
                $this->db->limit(1); 
                
                return $this->db->get($tabela)->row();
   
            }else{
                return false; 
            }

        }

        public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL){
            
            if($tabela && is_array($data)){
                
                $this->db->insert($tabela, $data); 

                if($get_last_id){
                    $this->session->set_userdata('last_id', $this->db->insert_id()); 
                }

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
                }else{
                    $this->session->set_flashdata('error','Erro ao salvar dados');
                }

            }else{
                



            }
        }

        public function update($tabela = NULL, $data = NULL, $condicao = NULL){
            if($tabela && is_array($data) && is_array($condicao) ){

               if( $this->db->update($tabela, $data, $condicao)){
                    $this->session->set_flashdata('sucesso', 'Dados salvo');
               }else{
                    $this->session->set_flashdata('error', 'Erro ao atualizar');
               }

            }else{

                return false; 
            
            }

        }

        public function delete($tabela = NULL, $condicao = NULL ){
            $this->db->db_debug = FALSE;

            if($tabela && is_array($condicao)){
                
                $status = $this->db->delete($tabela, $condicao);  

                $error = $this->db->error(); 
                
                if(!$status){

                    foreach($error as $code){
                        if($code ==1451){
                            $this->session->set_flashdata('error','registro nao pode ser deletado');
                        }

                    }
                }else{
                    $this->session->set_flashdata('sussecco','Registro excluido'); 

                }
                $this->db->db_debug = true;
            }else{
                return false; 

            }


        }

        public function generate_unique_code($tabela = null, $tipo_codigo = null, $tamanho_codigo = null, $campo_procura =null){
            do{
                $codigo = random_string($tipo_codigo, $tamanho_codigo); 
                $this->db->where($campo_procura, $codigo);
                $this->db->from($tabela); 
            }while($this->db->count_all_results()>= 1); 

            return $codigo;
        }
    }