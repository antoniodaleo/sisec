
      <?php $this->load->view('web/layout/navbar'); ?>

        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="img/figure/inner-page-banner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1><?php echo $titulo; ?></h1>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('welcome') ?>">Home</a>
                                </li>
                                <li><?php echo $post->post_titulo ; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Inne Page Banner Area End Here -->
        <!-- Single Recipe With Sidebar Area Start Here -->
        <section class="single-recipe-wrap-layout1 padding-top-74 padding-bottom-50">
            <div class="container">
                <div class="row gutters-60">
                    <div class="col-lg-8">
                        <div class="single-recipe-layout1">
                            <div class="ctg-name"><?php echo $post->post_legenda ?></div>
                            <h2 class="item-title"><?php echo $post->post_titulo ?></h2>
                            <div class="row mb-4">
                                <div class="col-xl-9 col-12">
                                    <ul class="entry-meta">
                                        <li class="single-meta"><a href="#"><i class="far fa-calendar-alt"></i><?php echo formata_data_banco_sem_hora($post->post_data); ?></a></li>
                                        <li class="single-meta"><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-12">
                                    <ul class="action-item">
                                        <li class="action-share-hover"><button><i class="fas fa-share-alt"></i></button>
                                            <div class="action-share-wrap">
                                                <a href="https://www.facebook.com/sisecceara" title="facebook" id="fb-root"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#" title="whatsapp"><i class="fab fa-whatsapp"></i></a>
                                               
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item-figure">
                                <img src="<?php echo base_url('uploads/produtos/'.$post->foto_caminho); ?>" alt="Product">
                            </div>
                            <p class="item-description mt-5"><?php echo(htmlspecialchars_decode($post->post_body));?>
                            </p>

                            
                            
                            <div class="tag-share">
                                <ul>
                                    <li>
                                        <ul class="inner-tag">
                                            <li>
                                                <a href="#">Burger</a>
                                            </li>
                                           
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="inner-share">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>  

                            <div class="also-like-wrap">
                                <h4 class="also-like-title">MAIS ARTIGOS</h4>
                                <div class="row">
                                    <?php foreach($post_festa as $post_k): ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                        <div class="product-box-layout2">
                                            <figure class="item-figure"><img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>"
                                                        alt="Product"></figure>
                                            <div class="item-content">
                                                <span class="sub-title">BREAKFAST</span>
                                                <h3 class="item-title"><a href="<?php echo base_url('artigo/'.$post_k->post_meta_link); ?>"><?php echo $post_k->post_titulo ?></a></h3>
                                                <ul class="entry-meta">
                                                    <li><a href="#"><i class="fas fa-user"></i>by <span>Sisec</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>             
                            </div>     
                        </div>
                    </div>

                    <!-- SIDEBAR ********************************************************************** -->
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ARTIGOS RECENTES</h3>
                            </div>
                            <div class="widget-latest">
                                <ul class="block-list">
                                    <?php foreach($post_festa as $post_k): ?>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="<?php echo base_url('uploads/produtos/'.$post_k->foto_caminho); ?>" width="90" alt="Post"></a>
                
                                            
                                        </div>
                                        <div class="item-content">
                                            <div class="item-ctg"><?php echo $post_k->post_legenda ?></div>
                                            <h4 class="item-title"><a href="#"><?php echo $post_k->post_titulo ?></a></h4>
                                            <div class="item-post-by"><a href="single-blog.html"><i class="fas fa-user"></i><span>by</span>
                                                 SISEC </a></div>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ENSCREVA-SE &amp; SIGA NÓS</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-youtube"></i>Subscribe</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="img/figure/figure4.jpg" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FEATURED ARTICLE</h3>
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
                                            <img src="img/product/product17.jpg" alt="Brand" class="img-fluid">
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
                                        <a href="#">DESERT</a>
                                    </li>
                                    <li>
                                        <a href="#">CAKE</a>
                                    </li>
                                    <li>
                                        <a href="#">BREAKFAST</a>
                                    </li>
                                    <li>
                                        <a href="#">BURGER</a>
                                    </li>
                                    <li>
                                        <a href="#">DINNER</a>
                                    </li>
                                    <li>
                                        <a href="#">PIZZA</a>
                                    </li>
                                    <li>
                                        <a href="#">SEA FOOD</a>
                                    </li>
                                    <li>
                                        <a href="#">SALAD</a>
                                    </li>
                                    <li>
                                        <a href="#">JUICE</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Recipe With Sidebar Area End Here -->