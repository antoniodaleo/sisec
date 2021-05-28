        <!-- Header Area Start Here -->
        <header class="header-one">
            <div id="header-main-menu" class="header-main-menu header-sticky">
                <div class="container">                    
                    <div class="row">
                        <div class="col-lg-8 col-md-3 col-sm-4 col-4 possition-static">
                             <!-- Logo Mobil -->
                            <div class="site-logo-mobile">
                                <a href="index.html" class="sticky-logo-light"><img width="40" src="<?php echo base_url('assets/web/img/logo-sisec.png'); ?>" alt="Comunidade Israelita Sefaradi do Ceará"></a>
                                <a href="index.html" class="sticky-logo-dark"><img width="40" src="<?php echo base_url('assets/web/img/logo-sisec.png'); ?>" alt="Site Logo"></a>
                            </div>
                            <!--Menu e SubMenu -->
                            <nav class="site-nav">
                                <ul id="site-menu" class="site-menu">
                                    <li><a href="<?php echo base_url('/') ?>">Home</a></li>


                                    <?php $categorias = categorias_navbar(); ?>

                                    <?php foreach($categorias as $cat_pai): ?>  

                                        <?php $categorias_filhas = categorias_filhas_navbar($cat_pai->categoria_id); ?>
                                            <li class=""><a href="<?php echo base_url('master/'.$cat_pai->categoria_meta_link); ?>"><?php echo $cat_pai->categoria_nome; ?></a>  
                                                <ul class="dropdown-menu-col-1">
                                                    <?php foreach ($categorias_filhas as $cat_filha): ?>   
                                                        <li class=""><a href="<?php //echo base_url('categoria/'.$cat_filha->categoria_meta_link); ?>"><?php echo $cat_filha->sub_categoria_nome; ?></a></li>
                                                    <?php endforeach; ?>   
                                                </ul>
                                            </li>

                                    <?php endforeach; ?>   
                                </ul>
                            </nav>
                        </div>
                        <!-- Button menu -->
                        <div class="col-lg-4 col-md-9 col-sm-8 col-8 d-flex align-items-center justify-content-end">
                            <div class="mob-menu-open toggle-menu">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <!-- Nav Social Network -->
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="nav-action-elements-layout2">
                                <ul class="nav-social">
                                    <li><a href="https://www.facebook.com/sisecceara" target="_blank" title="Pagina oficial Sisec"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank" title="Instagram oficial Sisec"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://bit.ly/SuporteTecnicoSisec" target="_blank" title="Suporte tecnico Sisec"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>

                         <!-- Logo Sisec Desktop-->
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="site-logo-desktop">
                                <a href="index.html" class="main-logo"><img width="50" src="<?php echo base_url('assets/web/img/logo-sisec.png') ?>" alt="Site Logo"></a>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-4">
                            <div class="nav-action-elements-layout3">
                                <ul>
                                    <li>
                                        <div class="header-search-box">
                                            <a href="#search" title="Search" class="search-button">
                                                <i class="flaticon-search"></i>
                                            </a> 
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->
