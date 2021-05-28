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
                  <div class="card-header d-block">
                    <h4><?php echo $titulo; ?></h4>
                    <a href="<?php echo base_url('restrito/post/core') ?>" class="btn btn-primary float-right">Cadastrar</a>
                  </div>
                  <div class="card-body">

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


                    <div class="table-responsive">
                      <table class="table table-striped data-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Titulo do post</th>
                            <th>Categoria</th>
                            
                            <th>Ativo</th>               
                            <th class="nosort">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($posts as $post): ?>
                            <tr>
                           
                              <td><?php echo $post->post_id; ?></td>
                              <td><?php echo $post->post_titulo; ?></td>

                              <td><?php echo $post->sub_categoria_nome; ?></td>

                              <td><?php echo ($post->post_ativo == 1 ? '<span class="badge badge-success"> Sim </span>' : '<span class="badge badge-danger">Não </span>' )  ?></td>
                             
                              <td>
                                <a href="<?php echo base_url('restrito/post/core/'.$post->post_id); ?>" class="btn btn-primary btn-icon"><i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('restrito/post/delete/'.$post->post_id); ?>" class="btn btn-icon btn-danger delete" data-confirm="Tem certeza da exclusão?"><i class="fas fa-times"></i></a>
                              </td>
                            </tr>
                          <?php endforeach;  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </section>




        <?php $this->load->view('restrito/layout/sidebar_settings') ?>
      </div>

     