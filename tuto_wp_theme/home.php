<?php





    get_header();
?>home.php
<hr>
    <main>
        <?php if(have_posts())while(have_posts()):the_post(); ?>
            <!--https://developer.wordpress.org/reference/functions/wp_list_categories/-->
            <!--https://developer.wordpress.org/reference/functions/get_terms/-->
            <!--https://developer.wordpress.org/reference/functions/get_term_link/-->
            <!--https://developer.wordpress.org/reference/functions/is_tax/-->
            <!--https://developer.wordpress.org/reference/functions/get_taxonomy_labels/-->
            <!--https://developer.wordpress.org/reference/functions/get_queried_object/-->
            <?= the_category() ?>
            <?= the_title() ?>
            <?= the_content() ?>
            <?php get_template_part('parts/taxonomy/sport', 'tenniss') ?>
            
        ?>
        <?php endwhile; ?>
    </main>
<?php
    get_footer();
        
        
    

