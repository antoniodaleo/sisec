<?php $this->load->view('restrito/layout/navbar'); ?>
<?php $this->load->view('restrito/layout/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
              
          <!-- Tabela 1 -->
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $titulo; ?></h4>
                  </div>

                  <?php
                    $attributos = array(
                      'name' => 'form_core', 
                    ); 

                    if(isset($post)){
                      $post_id = $post->post_id; 
                    }else{
                      $post_id = ''; 
                    }
                  ?>

                  <?php echo form_open('restrito/post/core/'.$post_id); ?>

                    <div class="card-body">


                    <?php  if(isset($post)):   ?>
                     
                        <div class="form-row">
                          <div class="col-md-6">
                            <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp; Ùltima alteração: </strong> <?php echo formata_data_banco_com_hora($post->post_data_alteracao)  ?></p>    
                          </div>
                          <div class="col-md-6">
                            <label><strong>Meta Link do post</strong></label>
                            <p class="text-info"> <i class=""></i>  <?php echo $post->post_meta_link; ?> </p>
                          </div>
                        </div> 
                      
                    <?php  endif;   ?>
   

                      <!-- Primeira linha de dados -->
                      <div class="form-row">
                        <!-- id Post -->
                        <div class="form-group col-md-2">
                          <label>ID do post</label>
                          <input type="text" name="post_id" readonly class="form-control b-0" value="<?php echo (isset($post) ? $post->post_id : 'ID post') ; ?>">
                        </div>
                        
                        <!-- Titulo -->
                        <div class="form-group col-md-4">
                          <label>Titulo do post</label>
                          <input type="text" name="post_titulo" class="form-control" value="<?php echo (isset($post) ? $post->post_titulo : set_value('post_titulo')) ; ?>">
                          <?php echo form_error('post_titulo','<div class="text-danger">','</div>') ?>
                        </div>

                        <!-- Categoria -->
                        <div class="form-group col-md-4">
                          <label for="inpState">Categoria</label>
                          <select name="post_categoria_id" id="inpState" class="form-control">

                          <option value="">Escolha..</option>

                          <?php foreach($categorias as $categoria) : ?>

                            <?php if(isset($post)) : ?>

                              <option value="<?php echo ($categoria->sub_categoria_id); ?>" <?php echo ($categoria->sub_categoria_id == $post->post_categoria_id ? 'selected' : '');  ?> ><?php echo  $categoria->sub_categoria_nome; ?></option>
                           
                            <?php else:  ?>

                              <option value="<?php echo ($categoria->sub_categoria_id); ?>" ><?php echo  $categoria->sub_categoria_nome; ?></option>

                            <?php endif;  ?>

                          <?php endforeach; ?>
                          </select>
                          <?php echo form_error('post_categoria_id','<div class="text-danger">','</div>') ?>

                        </div>

                        <!-- Destaque -->
                        <div class="form-group col-md-2">
                          <label >Post em destaque</label>
                          <select name="post_destaque" id="inpState" class="form-control">

                          <?php if(isset($post)) : ?>

                            <option value="1" <?php echo ($post->post_destaque == 1? 'selected' : ''  ) ; ?> >Sim</option>
                            <option value="0" <?php echo ($post->post_destaque == 0? 'selected' : ''  ) ; ?> >Não</option>
                          <?php else:  ?>

                            <option value="1" >Sim</option>
                            <option value="0" >Não</option>

                          <?php endif;  ?>
                            
                          </select>
                        </div>

                      </div>

                      <!-- Terza linha de dados -->
                      <div class="form-row">

                        <!-- Descrição -->
                        <div class="form-group col-md-12">
                          <label>Descrição do post</label>
                          <textarea name="post_descricao" id="" class="form-control"><?php echo (isset($post) ? $post->post_descricao : set_value('post_descricao')) ; ?></textarea>
                          <?php echo form_error('post_descricao','<div class="text-danger">','</div>') ?>
                        </div>
                        
                      </div>
                  
                      <!-- Quarta linha de dados -->
                      <div class="form-row">
                        <!-- Body do post -->
                        <div class="form-group col-md-12">
                          <label>Escreva seu artigo</label>
                          <textarea name="post_body" id="post_body" class="form-control"><?php echo (isset($post) ? $post->post_body : set_value('post_body')) ; ?></textarea>
                          <?php echo form_error('post_body','<div class="text-danger">','</div>') ?>
                        </div>
                      </div>

                      <!-- Quinta linha de dados -->
                      <div class="form-row">
                        <!-- Link video Youtube -->
                        <div class="form-group col-md-8">
                          <label>Link Youtube</label>
                          <textarea name="post_frame"  class="form-control"><?php echo (isset($post) ? $post->post_frame : set_value('post_frame')) ; ?></textarea>
                          <?php echo form_error('post_frame','<div class="text-danger">','</div>') ?>
                        </div>

                        <!-- Data do post -->      
                        <div class="col-md-2">
                          <label>Data do post</label>                                         
                          <input type="date" class="form-control form-control-user-date " name="post_data" placeholder="Data do post" value="<?php echo (isset($post)?  $post->post_data : set_value('post_data')) ; ?>">
                          <?php echo form_error('post_data','<small class="form-text text-danger">','</small>',''); ?>  
                        </div>
                        
                        <!-- Ativo -->
                        <div class="form-group col-md-2">
                          <label >Ativo</label>
                          <select name="post_ativo" id="inpState" class="form-control">

                          <?php if(isset($produto)) : ?>

                            <option value="1" <?php echo ($post->post_ativo == 1? 'selected' : ''  ) ; ?> >Sim</option>
                            <option value="0" <?php echo ($post->post_ativo == 0? 'selected' : ''  ) ; ?> >Não</option>
                          <?php else:  ?>

                            <option value="1" >Sim</option>
                            <option value="0" >Não</option>

                          <?php endif;  ?>
                            
                          </select>
                        </div>

                      </div>

                      <!-- Setima linha de dados -->
                      <div class="form-row">
                        <div class="form-group col-md-8">
                          <label>Imagens do post</label>
                          <div id="fileuploader"> 
                            
                          </div>

                          <div id="erro_uploaded" class="text-danger">

                          </div>

                          <?php echo form_error('fotos_produtos', '<div class="text-danger">','</div>'); ?>
                        </div>
                      </div>
                      
                      <!-- Sexta linha de dados -->
                      <div class="form-row">
                        <div class="col-md-12">

                          <?php if(isset($post)): ?>

                            <div id="uploaded_image" class="text-danger">
                              <?php foreach($fotos_produto as $foto): ?>
                                  <ul style="list-style: none; display: inline-block">
                                    <li>
                                      <img src="<?php echo base_url('uploads/produtos/'.$foto->foto_caminho) ;?>" width="80" class="img-thumbnail mr-1 mb-2"  >
                                      <input type="hidden" name="fotos_produtos[]" value="<?php echo $foto->foto_caminho ;?>">
                                      <a href="javascript:(void)" class="btn btn-danger d-block btn-icon mx-auto mb-30 btn-remove"><i class="fas fa-times"></i></a>
                                    </li>
                                  </ul>
                              <?php endforeach; ?>
                            </div>

                          <?php else: ?>

                            <div id="uploaded_image" class="text-danger">

                            </div>

                          <?php endif; ?>
                        </div>
                      </div>


                      <?php if(isset($post)): ?>
                        <input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>">
                      <?php endif;  ?>
        
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary mr-2">Salvar</button>
                      <a href="<?php echo base_url('restrito/post'); ?>" class="btn btn-dark">Voltar</a>
                    </div>

                  <?php echo form_close(); ?>
          

                </div>
              </div>
            </div>




          </div>
        </section>




        <?php $this->load->view('restrito/layout/sidebar_settings') ?>
      </div>

     