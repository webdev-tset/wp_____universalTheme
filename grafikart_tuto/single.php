<?php
    get_header()
?>
<!--
    LES FONCTIONS get_header() et get_footer()
    qui permmettent d'insérer la partir entete et footer
    Pour personnaliser ces fonctions, il faudra créer deux fichiers qu'on incluera dans cette page
-->
je suis dans single.php -- ne marche pas
<hr/>
    <?php if(have_posts()):  
        while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST
    ?>
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