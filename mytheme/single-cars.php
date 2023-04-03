<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">
        
        <h1><?php the_title();?></h1>
        <?php 
            //Checking if post have image and showing it if its.
            if(has_post_thumbnail()):?>
            <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">
        <?php endif;?>

        <div class="row">
            <div class="col-lg-6">
                <?php get_template_part('includes/section', 'custom-post');?>
                <?php 
                    //Single blog post with multiple sections in it.
                    wp_link_pages();
                ?>
            </div>
            <div class="col-lg-6">

            </div>

        </div>

        



    </div>
</section>



<?php get_footer(); ?>