<?php





    get_header();
?>index.php
    <main>
        <?php if(have_posts())while(have_posts()):the_post(); ?>
        <?= the_title() ?>
        <?= the_content() ?>
        <?php endwhile; ?>
    </main>
<?php
    get_footer();
        
        
    

