<!--ce que je veux faire ne fonctionne pas</br>
le lien rendu par le getter 'get_post_type_archive_link' ne créer pas de route vers ce fichier mais je ne comprends vraiment pas pourquoi ???? <br/>
-->
<?php
    get_header()
?>
    page-biens-immo.php
    <hr/>
    <?php if(have_posts()):  
        while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST
    ?>
        <h1><?php the_title() ?></h1>
        <a href="<?php the_permalink(); ?>">permalink</a> 
        <div><?php the_content() ?></div>
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
    <?php 
        // get_post()->comment_status = "open";
        comments_template();
        var_dump(get_post());
    ?>
<?php
    get_footer();
?>