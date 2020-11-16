<?php
/**
* Template Name: le nom de mon modèle d'article/page""
* Template Post Type: page, post
**/
?>



<?php
    get_header()
?>
<!--
    LES FONCTIONS get_header() et get_footer()
    qui permmettent d'insérer la partir entete et footer
    Pour personnaliser ces fonctions, il faudra créer deux fichiers qu'on incluera dans cette page
-->
    <?php if(have_posts()):  
        while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST
    ?>
        <p>Voici un modèle personnalisé ;)</p>
        <hr/>
        <h1><?php the_title() ?></h1>
        <?php //the_post_thumbnail() ?>
        <img src="<?php the_post_thumbnail_url(); ?>" width="100" />
        <div><?php the_content() ?></div>
    <?php endwhile; else: ?>
      <h3>désolé, il n'y a aucun article pour l'instant</h3>
    <?php endif; ?>
<?php
    get_footer()
?>