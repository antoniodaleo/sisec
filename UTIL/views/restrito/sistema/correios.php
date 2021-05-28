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

                    <?php if($message = $this->session->flashdata('sucesso') ) : ?>
                      <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                        <div class="alert-icon"><i class="fa fa-check-circle fa-lg"></i> </div>
                        <div class="alert-body">
                          <div class="alert-title">Perfeito!</div>
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          <?php echo $message; ?>
                        </div>
                      </div>
                    <?php endif; ?>

                    <?php if($message = $this->session->flashdata('erro') ) : ?>
                      <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                        <div class="alert-icon"><i class="fa fa-exclamation-circle fa-lg"></i> </div>
                        <div class="alert-body">
                          <div class="alert-title">Atenção</div>
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          <?php echo $message; ?>
                        </div>
                      </div>
                    <?php endif; ?>



                  
                    <?php echo form_open('restrito/sistema/correios/');  ?>

                    <div class="card-body">
                      
                       
                        <!-- Terceira Linha -->
                        <div class="form-group mb-3  row">
                          <div class="col-md-2">
                            <label>CEP de origem</label>
                            <input type="text" class="form-control form-control-user cep" name="config_cep_origem" placeholder="Cep" value="<?php echo $correio->config_cep_origem; ?>">
                            <?php echo form_error('config_cep_origem','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-2">
                            <label>Codigo de servico pac</label>
                            <input type="text" class="form-control form-control-user codigo_servico_correios" name="config_codigo_pac"  value="<?php echo $correio->config_codigo_pac; ?>">
                            <?php echo form_error('config_codigo_pac','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                            <label>Codigo de servico SEDEX</label>
                            <input type="text" class="form-control form-control-user codigo_servico_correios" name="config_codigo_sedex"  value="<?php echo $correio->config_codigo_sedex; ?>">
                            <?php echo form_error('config_codigo_sedex','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                            <label>Valor a ser somado ao Frete</label>
                            <input type="text" class="form-control form-control-user money2" name="config_somar_frete"  value="<?php echo $correio->config_somar_frete; ?>">
                            <?php echo form_error('config_somar_frete','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-2">
                            <label>Valor declarado</label>
                            <input type="text" class="form-control form-control-user money2" name="config_valor_declarado"  value="<?php echo $correio->config_valor_declarado; ?>">
                            <?php echo form_error('config_valor_declarado','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>


                          <?php if(isset($correio)): ?>
                            <input type="hidden" name="sistema_id" value="<?php echo $correio->config_id; ?>">
                          <?php endif;  ?>
                        </div>
              
                    </div> 
                    <div class="card-footer">
                      <button class="btn btn-primary mr-2">Salvar</button>
                    </div>

                      
                    <?php echo form_close();  ?>
                    
                </div>
              </div>
            </div>
          </div>
        </section>




      <?php $this->load->view('restrito/layout/sidebar_settings') ?>
      </div>

     