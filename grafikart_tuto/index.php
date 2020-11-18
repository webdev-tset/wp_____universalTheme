<?php
    get_header()
?>
<!--
    LES FONCTIONS get_header() et get_footer()
    qui permmettent d'insérer la partir entete et footer
    Pour personnaliser ces fonctions, il faudra créer deux fichiers qu'on incluera dans cette page
-->
index.php
<hr/>
    Bijour tout le monde: <?php wp_title(); ?>
    <hr/>
    l'ensemble des termes de la taxonomie 'sport' ayant au moins un article
    <?php get_template_part('parts/post_taxonomy_container') ?>
    <hr/>
    <?php if(have_posts()): ?>
      <ul>
        <?php while(have_posts()): the_post(); //CETTE FONCTION(the_post) PERMET DE CHARGER LE PROCHAIN POST?>
            <li>
              <?php //require('parts/post.php') ?>
              <?php get_template_part('parts/post') ?>
            </li>---
        <?php endwhile; ?>
      </ul>
  <?php else: ?>
      <h3>..pas d'article</h3>
  <?php endif; ?>
    <!-- Large modal -->
<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<!-- Small modal -->
<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div-->
    <hr>
    <?php 
      // var_dump(get_post());
      if(comments_open())
        comments_template();
    ?>
<?php
    get_footer()
?>