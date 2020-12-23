<?php



    $bodyClassName = "articles";
    get_header(null, ['bodyClassName' => $bodyClassName]);
?>home.php
<hr>
    <!--https://wpchannel.com/wordpress/tutoriels-wordpress/afficher-compteur-articles-wordpress/-->
    <?= "<p class='container border text-center'>".wp_count_posts('post')->publish." article(s):</p>"?>
    <main class="p-2">
        <?php if(have_posts())while(have_posts()):the_post();wp_count_posts() ?>

            <!--https://developer.wordpress.org/reference/functions/wp_list_categories/-->
            <!--https://developer.wordpress.org/reference/functions/get_terms/-->
            <!--https://developer.wordpress.org/reference/functions/get_term_link/-->
            <!--https://developer.wordpress.org/reference/functions/is_tax/-->
            <!--https://developer.wordpress.org/reference/functions/get_taxonomy_labels/-->
            <!--https://developer.wordpress.org/reference/functions/get_queried_object/-->
            
            <div class="card">
                <!--img class="card-img-top" src="holder.js/100x180/" alt=""-->
                <?=var_dump(wp_get_attachment_thumb_url(get_post()->ID))?>
                <?=the_post_thumbnail('article_header')?>
                <?php//print_r( $_wp_additional_image_sizes ); ?>
                <?=the_category()?>
                <div class="card-body">
                    <h4 class="card-title"><?= the_title() ?></h4>
                    <p class="card-text"><?=the_content()?></p>
                </div>
            </div>
        
        
        <?php endwhile; ?>
        <?= wp_get_attachment_thumb_url() ?>
        <?php get_template_part('parts/taxonomy/sport', 'tenniss') ?>
            
        <hr>
<!--PAGINATION------------------------------------------------->
        <div class="container pagination">
            <?=get_§pagination(['type'=>'array'])?>
        </div>
        <!--hr>
        <div class="container pagination">
            <?= get_the_posts_pagination(['screen_reader_text'=>"Mon titre de pagination personnalisé"]); ?>
        </div>
        <hr-->
<!--------------------------------------------------------->
<!--END OF------------------------------------------------->
</main>
<?php
    get_footer();
        
        
    

