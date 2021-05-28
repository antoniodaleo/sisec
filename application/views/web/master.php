
<?php $this->load->view('web/layout/navbar'); ?>

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?php //echo base_url('/') ?>">Home</a></li>
                <li class="active"><?php //echo $categoria ;?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
    
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <section class="padding-bottom-18">
        <div class="container">
            <div class="row">
            <?php foreach($art as $post_t): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="product-box-layout1">
                        <figure class="item-figure"><a href="<?php echo base_url('artigo/'.$post_t->post_meta_link); ?>"><img src="<?php //echo base_url('uploads/produtos/'.$post_t->foto_caminho); ?>" alt="<?php echo $post_t->post_legenda ?>"
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
            <div class="paginazione">

                <nav aria-label="Page navigation example">

                <ul class="pagination">

                <?php echo $pagination; ?>

                </ul>

                </nav>

                </div>
            </div>
            </div>
        </div>
    </section>

   

</div>
</div>
<!-- Content Wraper Area End Here -->

