<?php





    get_header();
?>
home.php<hr/>
    <main>
        <?php if(have_posts())while(have_posts()):the_post(); ?>
        <?= the_title() ?>
        <?= the_content() ?>
        <?= the_shortlink() ?>
        <br>
        <a href="<?= the_permalink() ?>">le lien</a>
        <hr>
        <hr>
        <hr>
        <?php endwhile; ?>
    </main>
<?php
    get_footer();
        
        
    

