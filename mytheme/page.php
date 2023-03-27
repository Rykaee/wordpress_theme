<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">

        <section class="row">

            <div class="col-lg-3">
                 <?php 
                    //Checking if there is available sidebar called 'page-sidebar' and active it.
                    if (is_active_sidebar('page-sidebar') ):?>
                    <?php dynamic_sidebar('page-sidebar');?>
                <?php endif;?>
            </div>
           
            <div class="col-lg-9">
                <h1><?php the_title();?></h1>

                <?php get_template_part('includes/section', 'content');?>

                <?php 
                    //Checking if page have image and showing it if its.
                    if(has_post_thumbnail()):?>
                    <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">
                <?php endif;?>
            </div>
        </section>
    </div>
</section>



<?php get_footer(); ?>