


     <?php
          get_header();


     ?>
     <main id="main">
          <div class="jumbotron jumbotron-fluid">
               <div class="container">
                    <h1 class="display-3"><?= the_title(); ?></h1>
                    <p class="lead">Jumbo helper text</p>
                    <hr class="my-2">
                    <p>More info</p>
                    <p class="lead">
                         <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                    </p>
               </div>
          </div>
          <?php if(have_posts())
               while(have_posts()):the_post();?>
          <div class="contaoiner">
               <div class="">
               <div class="card">
               <?= the_post_thumbnail('thumbnail'); ?>
               <?= the_shortlink() ?>
               <a href="<?php the_permalink(); ?>"></a>
                    <div class="card-body">
                    <h3 class="card-title"></h3>
                    <p class="card-text">
                         <?= the_content() ?>
                    </p>
                    </div>
               </div>
               </div>
          </div>
     </main>
     <?php
          endwhile;
          get_footer();


     ?>


