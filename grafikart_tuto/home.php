<!--ce que je veux faire ne fonctionne pas</br>
le lien rendu par le getter 'get_post_type_archive_link' ne créer pas de route vers ce fichier mais je ne comprends vraiment pas pourquoi ???? <br/>
-->
<?php
    get_header()
?>
    page des articles: home.php
    <hr/>
    <?php if(have_posts()):  
        while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST
    ?>
        <h1><?= the_title() ?></h1>
        <a href="<?php the_permalink(); ?>">permalink</a> 
        <div><?= the_content() ?></div>
        <?= get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true); ?>
        <div><?php the_category() ?></div>
        <hr/>
    <?php endwhile; else: ?>
      <h3>désolé, il n'y a aucun article pour l'instant</h3>
    <?php endif; ?>
    
    <div>
        <p>
            différents testes de getter pour la pagination
        </p>
        <a href="<?php echo paginate_links(); ?>">the_posts_navigation</a>
        <a href="<?php the_posts_pagination(); ?>">the_posts_pagination</a>
        <?= next_posts_link(); ?>
        <?= previous_posts_link(); ?>
        <hr/>
    </div>
    <?= generate_pagination(); ?>

    <hr/>
    <h3>Article relatifs</h3>
    <?php $q = new WP_Query([
        'post__not_in' => [get_the_ID()],
        'post_type' => 'post',
        'post_per_page' => 3,
        'tax_query' => [
            'taxonomy' => 'sport',
            'field' => 'slug',
            'terms' => 'football'
        ],
        'meta_query' => [
            [
                'key' => SponsoMetaBox::META_KEY,
                'compare' => 'EXIST'
            ]
        ]
    ]); 
    while($q->have_posts()): $q->the_post();
    ?>
    <li>
        <?php //require('parts/post.php') ?>
        <?php get_template_part('parts/post') ?>
    </li>---
    <?php endwhile; wp_reset_postdata(); ?>
<?php
    get_footer();
?>