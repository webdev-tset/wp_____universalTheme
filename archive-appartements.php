<?php
    get_header()
?>
<!--
    LES FONCTIONS get_header() et get_footer()
    qui permmettent d'insérer la partir entete et footer
    Pour personnaliser ces fonctions, il faudra créer deux fichiers qu'on incluera dans cette page
-->
archive-appartements.php
<hr/>
    <h1>liste des apparts</h1>
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
<?php
    get_footer()
?>