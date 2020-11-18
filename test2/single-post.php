


     <?php
          get_header();


     ?>
     <main id="main">
          <h3>Page articles (single-post.php)</h3>
          <?= the_title(); ?>
          <?= the_content() ?>
          <?= the_post_thumbnail('thumbnail'); ?>
     </main>
     <?php
          get_footer();


     ?>


