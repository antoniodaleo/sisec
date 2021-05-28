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



                  
                    <?php echo form_open('restrito/sistema/');  ?>

                    <div class="card-body">
                      
                        <!-- Primeira Linha -->
                        <div class="form-group row">
                          <div class="col-md-3">
                              <label>Razão Social</label>
                              <input type="text" class="form-control form-control-user" name="sistema_razao_social" placeholder="Razão Social" value="<?php echo $sistema->sistema_razao_social; ?>">
                              <?php echo form_error('sistema_razao_social','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Nome Fantasia</label>
                              <input type="text" class="form-control form-control-user" name="sistema_nome_fantasia" placeholder="Nome Fantasia" value="<?php echo $sistema->sistema_nome_fantasia; ?>">
                              <?php echo form_error('sistema_nome_fantasia','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Cnpj</label>
                              <input type="text" class="form-control form-control-user cnpj" name="sistema_cnpj" placeholder="CNPJ" value="<?php echo $sistema->sistema_cnpj; ?>">
                              <?php echo form_error('sistema_cnpj','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Sistema IE</label>
                              <input type="text" class="form-control form-control-user" name="sistema_ie" placeholder="sistema_ie" value="<?php echo $sistema->sistema_ie; ?>">
                              <?php echo form_error('sistema_ie','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                        </div>              
                        <!-- Segunda Linha -->
                        <div class="form-group mb-3 row">
                          <div class="col-md-3">
                              <label>Telefone Fixo</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="sistema_telefone_fixo" placeholder="Telefone Fixo" value="<?php echo $sistema->sistema_telefone_fixo; ?>">
                              <?php echo form_error('sistema_telefone_fixo','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Telefone movel</label>
                              <input type="sistema_telefone_movel" class="form-control form-control-user sp_celphones" name="sistema_telefone_movel" placeholder="Sua email" value="<?php echo $sistema->sistema_telefone_movel; ?>">
                              <?php echo form_error('sistema_telefone_movel','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Email</label>
                              <input type="email" class="form-control form-control-user" name="sistema_email" placeholder="Sua email" value="<?php echo $sistema->sistema_email; ?>">
                              <?php echo form_error('username','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                              <label>Site Url</label>
                              <input type="text" class="form-control form-control-user" name="sistema_site_url" placeholder="Site url" value="<?php echo $sistema->sistema_site_url; ?>">
                              <?php echo form_error('username','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                        </div>
                        <!-- Terceira Linha -->
                        <div class="form-group mb-3  row">
                          <div class="col-md-3">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="sistema_endereco" placeholder="Endereço" value="<?php echo $sistema->sistema_endereco; ?>">
                            <?php echo form_error('sistema_endereco','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-1">
                            <label>Numero</label>
                            <input type="text" class="form-control form-control-user " name="sistema_numero" placeholder="sistema_numero" value="<?php echo $sistema->sistema_numero; ?>">
                            <?php echo form_error('sistema_numero','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                            <label>CEP</label>
                            <input type="text" class="form-control form-control-user cep" name="sistema_cep" placeholder="sistema_cep" value="<?php echo $sistema->sistema_cep; ?>">
                            <?php echo form_error('sistema_cep','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="sistema_cidade" placeholder="sistema_cidade" value="<?php echo $sistema->sistema_cidade; ?>">
                            <?php echo form_error('sistema_cidade','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          <div class="col-md-2">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user uf" name="sistema_estado" placeholder="sistema_estado" value="<?php echo $sistema->sistema_estado; ?>">
                            <?php echo form_error('sistema_estado','<small class="form-text text-danger">','</small>',''); ?>  
                          </div>
                          
                          <?php if(isset($sistema)): ?>
                            <input type="hidden" name="sistema_id" value="<?php echo $sistema->sistema_id; ?>">
                          <?php endif;  ?>
                        </div>
                        <!-- Quarta Linha -->
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label>Quantidade de produtos em destaques</label>
                            <input type="number" class="form-control form-control-user uf" name="sistema_produtos_destaques" placeholder="Quant.." value="<?php echo $sistema->sistema_produtos_destaques; ?>">
                            <?php echo form_error('	sistema_produtos_destaques','<small class="form-text text-danger">','</small>',''); ?>  

                          </div>
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

     