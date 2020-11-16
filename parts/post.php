template parts/post.php
<hr>
    <?php the_title(); ?> --- <?php the_author();  ?> --- <?php  //the_category();  ?>
    <a href="<?php the_permalink(); ?>">permalink</a> 
    <?php the_post_thumbnail('card-header') ?>
    <?php the_category() ?>
    <ul>
    <?php the_terms(get_the_ID(), 'sport', '<li>', '</li><li>', '<li>') ?>
    </ul>
    <?php 
        var_dump(get_the_terms(get_the_ID(), 'sport', '<li>', '</li><li>', '<li>') )
    ?>