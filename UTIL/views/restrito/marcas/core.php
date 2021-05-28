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

                    if(isset($marca)){
                      $marca_id = $marca->marca_id; 
                    }else{
                      $marca_id = ''; 
                    }
                  ?>

                  <?php echo form_open('restrito/marcas/core/'.$marca_id); ?>

                    <div class="card-body">
                      <!-- Primeira linha de dados -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label>Nome</label>
                          <input type="text" name="marca_nome" class="form-control" value="<?php echo (isset($marca) ? $marca->marca_nome : set_value('first_name')) ; ?>">
                          <?php echo form_error('marca_nome','<div class="text-danger">','</div>') ?>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="inpState">Ativa</label>
                          <select name="marca_ativa" id="inpState" class="form-control">

                          <?php if(isset($marca)) : ?>

                            <option value="1" <?php echo ($marca->marca_ativa == 1? 'selected' : ''  ) ; ?> >Sim</option>
                            <option value="0" <?php echo ($marca->marca_ativa == 0? 'selected' : ''  ) ; ?> >Não</option>
                          <?php else:  ?>

                            <option value="1" >Sim</option>
                            <option value="0" >Não</option>

                          <?php endif;  ?>
                            
                          </select>
                        </div>

                        <?php if(isset($marca)): ?>
                          <div class="form-group col-md-4">
                            <label>Metalink da marca</label>
                            <input type="text" name="marca_meta_link" class="form-control border-0" value="<?php echo $marca->marca_meta_link ; ?>" readonly>
                          </div>
                        <?php endif; ?>


                      </div>
                      
                      <?php if(isset($marca)): ?>
                        <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id; ?>">
                      <?php endif;  ?>

                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary mr-2">Salvar</button>
                      <a href="<?php echo base_url('restrito/marcas'); ?>" class="btn btn-dark">Voltar</a>
                    </div>

                  <?php echo form_close(); ?>
          

                </div>
              </div>
            </div>




          </div>
        </section>




        <?php $this->load->view('restrito/layout/sidebar_settings') ?>
      </div>

     