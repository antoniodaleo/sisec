       
       <?php $this->load->view('web/layout/navbar'); ?>
       
       <!-- Slider Carosello Start Here -->
        <section class="ranna-slider-area">
            <div class="container">

                <!-- Inizia il carosello -->
                <div class="rc-carousel nav-control-layout2" data-loop="true" data-items="30" data-margin="5"
                    data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false"
                    data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                    data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                    data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
                    data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
                    data-r-extra-large-dots="false">
                    
                    <!-- Viene caricata l immagine -->
                    <div class="ranna-slider-content-layout1">
                        <?php foreach($post_destaques as $post): ?>
                        <figure class="item-figure"><a href="<?php echo base_url('artigo/'.$post->post_meta_link); ?>"><img src="<?php echo base_url('uploads/produtos/'.$post->foto_caminho); ?>" alt="<?php echo $post->post_legenda ?>"></a></figure>
                        <div class="item-content">
                            <span class="sub-title">PRIMO PIANO</span>
                            <h2 class="item-title"><a href="single-recipe1.html"><?php echo $post->post_titulo ?></a></h2>
                            
                            <p><?php echo $post->post_descricao ?></p>
                            <ul class="entry-meta">
                                <li><a href="#"><i class="fas fa-clock"></i><?php  echo formata_data_banco_sem_hora($post->post_data) ; ?></a></li>
                                <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                            </ul>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider Carosello End Here -->

        <!-- Random Torah Start Here -->
        <section class="padding-bottom-18">
            <div class="container">
                <div class="row">
                <?php foreach($post_torah as $post_t): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-box-layout1">
                            <figure class="item-figure"><a href="<?php echo base_url('artigo/'.$post_t->post_meta_link); ?>"><img src="<?php echo base_url('uploads/produtos/'.$post_t->foto_caminho); ?>" alt="<?php echo $post_t->post_legenda ?>"
                                        alt="Product"></a></figure>
                            <div class="item-content">
                                <span class="sub-title">TORAH</span>
                                <h3 class="item-title"><a href="single-recipe1.html"><?php echo $post_t->post_titulo ?></a></h3>
                                <ul class="entry-meta">
                                    <li><a href="#"><i class="fas fa-clock"></i><?php  echo formata_data_banco_sem_hora($post_t->post_data) ; ?></a></li>
                                    <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>

                </div>
            </div>
        </section>
        <!-- Random Torah End Here -->

        <!-- Trending Kabala Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="row gutters-60">

                    <?php foreach($post_kabalah as $post_k): ?>
                    <div class="col-lg-8">
                        <div class="section-heading heading-dark">
                            <h2 class="item-heading">ARTIGO DO DIA</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-box-layout1">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="<?php echo base_url('uploads/produtos/'.$post_t->foto_caminho); ?>"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">KABALAH</span>
                                        <h2 class="item-title"><a href="single-recipe1.html"><?php echo $post_k->post_titulo ?></a></h2>
                                      
                                        <p><?php echo $post_k->post_descricao ?></p>
                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="fas fa-clock"></i><?php  echo formata_data_banco_sem_hora($post_k->post_data) ; ?></a></li>
                                            <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Start post receitas -->
                            <?php foreach($post_receita as $post_k): ?>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="product-box-layout1">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="<?php echo base_url('assets/web/img/product/product5.jpg'); ?>"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">RECEITAS</span>
                                        <h3 class="item-title"><a href="single-recipe1.html"><?php echo $post_k->post_titulo ?></a></h3>
                                        <p><?php echo $post_k->post_descricao ?> </p>
                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="fas fa-clock"></i><?php echo formata_data_banco_sem_hora($post_k->post_data) ; ?></a></li>
                                            <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Ends post receitas -->

                            <!-- Start post judaismo -->
                            <?php foreach($post_judaismo as $post_k): ?>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="product-box-layout1">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>" alt="<?php echo $post->post_legenda ?>"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">JUDAISMO</span>
                                        <h3 class="item-title"><a href="single-recipe1.html"><?php echo $post_k->post_titulo ?></a></h3>
                                        <p><?php echo $post_k->post_descricao ?> </p>
                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="fas fa-clock"></i><?php echo formata_data_banco_sem_hora($post_k->post_data) ; ?></a></li>
                                            <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Ends post judaismo -->


                        </div>
                        <!-- Advertising -->
                        <div class="ranna-ad-box">
                            <a href="#"><img src="<?php echo base_url('assets/web/img/figure/figure1.jpg'); ?>" alt="ad"></a>
                        </div>
                         <!-- End Advertising -->
                    </div>
                    <?php endforeach;  ?>

                     <!-- Sidebar -->
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <!-- Biografia -->
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">NOSSA HISTORIA</h3>
                            </div>
                            <div class="widget-about">
                                <figure class="author-figure"><img src="<?php echo base_url('assets/web/img/figure/logo.jpg'); ?>" alt="about"></figure>
                                <h4>Sisec | Comunidade Hebraica de Fortaleza</h4>
                                <p>A sisec foi fondata no 1990 por a familia Cosmi. A sisec e´uma sociedade israelita sefaradi.</p>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ESCREVA-SE &amp; SIGA-NOS</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="https://www.facebook.com/sisecceara" target="_blank"><i class="fab fa-facebook-f"></i>Sisec Page</a></li>
                                    <li class="single-item"><a href="https://bit.ly/SuporteTecnicoSisec" target="_blank"><i class="fab fa-whatsapp"></i>Bem Vindo</a></li>
                                    <li class="single-item"><a href="" target="_blank"><i class="fab fa-instagram" ></i>Siga-nós</a></li>
                                    <li class="single-item"><a href="https://www.youtube.com/channel/UChbqCMyBl-uSHU9lt7cqx4A" target="_blank"><i class="fab fa-youtube"></i>Inscreve-se</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ULTIMOS POST</h3>
                            </div>
                            <div class="widget-latest">
                                <ul class="block-list">
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img width="90" src="<?php echo base_url('uploads/produtos/small/foto1.jpg'); ?>" alt="Post"></a>
                                            <div class="count-number">1</div>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-ctg">DESERT</div>
                                            <h4 class="item-title"><a href="#">Salami Oven Roasted are
                                                    Mozzarella Oelette</a></h4>
                                            <div class="item-post-by"><a href="single-blog.html"><i class="fas fa-user"></i><span>by</span>
                                                    John Martin</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="img/figure/figure2.jpg" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        <!-- Email  ---------------------------- Vamos usar o AJAX -->
                        <div class="widget">
                            <div class="widget-newsletter-subscribe">
                            <div class="alert" id="alert" role="alert"></div>
                            <?php //echo form_open('email');  ?>
                                
                                <h3>RECEBA AS NOTICIAS</h3>
                                <p>Coloca sua email</p>

                                
                                <div class="newsletter-subscribe-form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email_descricao"
                                            data-error="Sua email" required> 
                                    </div>
                                    <div class="form-group mb-none">
                                        <button type="submit" class="item-btn">ENVIAR</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Trending Recipe End Here -->


        <!-- Editor’s Choice Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="section-heading heading-dark">
                    <h2 class="item-heading">RISPOSTE DEL RABINO</h2>
                </div>
                <div class="row">
                    <?php foreach($post_festa as $post_k): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product-box-layout2">
                            <figure class="item-figure"><a href="single-recipe1.html"><img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>"
                                        alt="Product"></a></figure>
                            <div class="item-content">
                                <span class="sub-title">FESTAS</span>
                                <h3 class="item-title"><a href="single-recipe1.html"><?php echo $post_k->post_titulo ?></a></h3>
                                <ul class="entry-meta">
                                    <li><a href="#"><i class="fas fa-clock"></i><?php echo formata_data_banco_sem_hora($post_k->post_data) ; ?></a></li>
                                    <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Editor’s Choice End Here -->

        <!-- Popular Recipe Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="row gutters-60">
                    <div class="col-lg-8">
                        <div class="section-heading heading-dark">
                            <h2 class="item-heading">SALMO DO DIA</h2>
                        </div>
                        <div class="row">
                            <?php foreach($post_salmo as $post_k): ?>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="product-box-layout3">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">SALMOS</span>
                                        <h3 class="item-title"><a href="single-recipe1.html"><?php echo $post_k->post_titulo ?></a></h3>
                                       
                                        <p><?php echo $post_k->post_descricao ?></p>
                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="fas fa-clock"></i><?php echo formata_data_banco_sem_hora($post_k->post_data) ; ?></a></li>
                                            <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;  ?>   
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">NEWS FROM ISRAEL</h3>
                            </div>
                            <div class="widget-featured-feed">
                                <div class="rc-carousel nav-control-layout1" data-loop="true" data-items="3"
                                    data-margin="5" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="700"
                                    data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1"
                                    data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1"
                                    data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1"
                                    data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                                    data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1"
                                    data-r-large-nav="true" data-r-large-dots="false" data-r-extra-large="1"
                                    data-r-extra-large-nav="true" data-r-extra-large-dots="false">
                                    <div class="featured-box-layout1">
                                        <div class="item-img">
                                            <img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>" alt="Brand" class="img-fluid">
                                        </div>
                                        <div class="item-content">
                                            <span class="ctg-name">BREAKFAST</span>
                                            <h4 class="item-title"><a href="single-recipe1.html">Baked Garlic Prawn</a></h4>
                                            <p>Definitiones noel ei verear intelle
                                                gatpri civibus consequat area
                                                refund efficiantue.</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR TAGS</h3>
                            </div>
                            <div class="widget-tag">
                                <ul>
                                    <li>
                                        <a href="#">RECEITAS</a>
                                    </li>
                                    <li>
                                        <a href="#">TORAH</a>
                                    </li>
                                    <li>
                                        <a href="#">JUDAISMO</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Recipe End Here -->

        

