<?php





    get_header();
?>front-page.php
<hr>
    <main>
        <?php if(have_posts())while(have_posts()):the_post(); ?>
        <?= the_title() ?>
        <?= the_content() ?>
        <?php endwhile; ?>
        
        <hr>
        
        <div class="generated">
            <?=get_§pagination(['type'=>'array'])?>
        </div>
    </main>
<?php
    dynamic_sidebar('homepage'); 
    // get_sidebar('homepage');


    get_footer();
        
        
    

