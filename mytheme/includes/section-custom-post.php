<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

    <?php the_content();?>


    <?php
        //Get the tags and looping them to separate.
        $tags = get_the_tags();
        if($tags):
        foreach($tags as $tag):?>
            <a href="<?php echo get_tag_link($tag->term_id);?>" class="badge bg-success">
                <?php echo $tag->name; ?>
            </a>
        <?php endforeach;?>

        <?php
            //Looping categories and assign links to them.
            $categories = get_the_category();
            foreach($categories as $cat):?>
                <a href="<?php echo get_category_link($cat->term_id)?>">
                    <?php echo $cat->name; ?>
                </a>
            <?php endforeach; endif;?>

        <?php
        /*
            //If you want simple comment section
            comments_template();
        */
        ?>
        <?php echo "<p>" .  get_the_date('l, d/m/Y') . "</p>";?>

<?php endwhile; else: endif;?>