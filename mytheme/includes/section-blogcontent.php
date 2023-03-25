<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

    <?php echo "<p>" .  get_the_date('l, d/m/Y') . "</p>";?>

    <?php the_content();?>

    <?php
        //Adding posts to who was author.
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
        echo "<p>" . "Posted by: " .  $fname . ' ' . $lname . "</p>";
    ?>

    <?php
        //Get the tags and looping them to separate.
        $tags = get_the_tags();
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
            <?php endforeach;?>

        <?php
        /*
            //If you want simple comment section
            comments_template();
        */
        ?>

<?php endwhile; else: endif;?>