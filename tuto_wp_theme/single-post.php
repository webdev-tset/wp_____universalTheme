<?php





    get_header();
?>single-post.php
    <main>
        <?php if(have_posts())while(have_posts()):the_post(); ?>
        <?= the_title() ?>
        <?= the_content() ?>
        <?= 
            $a=wp_get_post_categories(get_the_ID());
            foreach($a as $k=>$v){
                var_dump( get_category($v)->name);
            }
        ?>
        <?php endwhile; ?>
    </main>
<?php
    get_footer();
        
        
    

