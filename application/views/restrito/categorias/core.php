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

                    if(isset($categoria)){
                      $categoria_id = $categoria->categoria_id; 
                    }else{
                      $categoria_id = ''; 
                    }
                  ?>

                  <?php echo form_open('restrito/categorias/core/'.$categoria_id); ?>

                    <div class="card-body">
                      <!-- Primeira linha de dados -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label>Nome da categoria</label>
                          <input type="text" name="categoria_nome" class="form-control" value="<?php echo (isset($categoria) ? $categoria->categoria_nome : set_value('categoria_nome')) ; ?>">
                          <?php echo form_error('categoria_nome','<div class="text-danger">','</div>') ?>
                        </div>

                        <div class="form-group col-md-2">
                          <label for="inpState">Ativa</label>
                          <select name="categoria_ativa" id="inpState" class="form-control">

                          <?php if(isset($categoria)) : ?>

                            <option value="1" <?php echo ($categoria->categoria_ativa == 1? 'selected' : ''  ) ; ?> >Sim</option>
                            <option value="0" <?php echo ($categoria->categoria_ativa == 0? 'selected' : ''  ) ; ?> >Não</option>
                          <?php else:  ?>

                            <option value="1" >Sim</option>
                            <option value="0" >Não</option>

                          <?php endif;  ?>
                            
                          </select>
                        </div>


                        <?php if(isset($categoria)): ?>
                          <div class="form-group col-md-3">
                            <label>Metalink da categoria</label>
                            <input type="text" name="categoria_pai_meta_link" class="form-control border-0" value="<?php echo $categoria->categoria_meta_link ; ?>" readonly>
                          </div>
                        <?php endif; ?>
                      </div>
                      
                      
                     
                      <?php if(isset($categoria)): ?>
                        <input type="hidden" name="categoria_id" value="<?php echo $categoria->categoria_id; ?>">
                      <?php endif;  ?>

                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary mr-2">Salvar</button>
                      <a href="<?php echo base_url('restrito/categorias'); ?>" class="btn btn-dark">Voltar</a>
                    </div>

                  <?php echo form_close(); ?>
          

                </div>
              </div>
            </div>




          </div>
        </section>




        <?php $this->load->view('restrito/layout/sidebar_settings') ?>
      </div>

     