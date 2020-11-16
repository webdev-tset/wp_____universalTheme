


     <?php
          get_header();


     ?>
     <main id="main">
          <h3>Page articles (home.php)</h3>
          <ul class="row">
               <?php if(have_posts())
               while(have_posts()):the_post();?>
               <li class="card col-md-6">
                    <?= the_post_thumbnail('thumbnail'); ?>
                    <?= the_shortlink() ?>
                    <a href="<?php the_permalink(); ?>"></a>
                    <div class="card-body">
                         <h3 class="card-title"><?= the_title(); ?></h3>
                         <p class="card-text">
                         <?= the_content() ?>
                         </p>
                    </div>
               </li>
               <?php
               endwhile;?>
          </ul>
     </main>
     <?php
          get_footer();


     ?>


