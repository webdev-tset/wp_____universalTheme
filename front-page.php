<?php
    get_header()
?>
<!--
    LES FONCTIONS get_header() et get_footer()
    qui permmettent d'insérer la partir entete et footer
    Pour personnaliser ces fonctions, il faudra créer deux fichiers qu'on incluera dans cette page
-->
front-page
<hr/>
    <?php if(have_posts()):  
        while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST
    ?>
        <h1><?php the_title() ?></h1>
        <div><?php the_content() ?></div>
        <hr/>
    <?php endwhile; else: ?>
      <h3>désolé, il n'y a aucun article pour l'instant</h3>
    <?php endif; ?>

    <a href="<?php get_post_type_archive_link('page'); ?>">Les archives _</a>


<hr/>
<?php get_sidebar('homepage'); ?>
<?php
    get_footer();
?>