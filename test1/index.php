
<?php get_header(); ?>





<main id="main">
<!--
      https://developer.wordpress.org/themes/basics/the-loop/
 -->
     <?= get_template(); ?>
     <?= get_template_directory(); ?>
     <?= get_template_directory_uri(); ?>
     <?= get_theme_root(); ?>
     <hr/>
     <?php 
          if(have_posts()): while(have_posts()):  the_post(); 
               echo the_title();
               var_dump( set_post_format(get_post()->ID, 'link' ));
               var_dump( get_post_format());
               echo'
               <div class="container">
                    <div class="row p-5">
                         <div class="card border">
                              <img class="card-img-top" src="holder.js/100x180/" alt="">
                              <div class="card-body">
                                   <h4 class="card-title">Title</h4>
                                   <p class="card-text">Text</p>
                              </div>
                         </div>
                         <div class="card border">
                              <img class="card-img-top" src="holder.js/100x180/" alt="">
                              <div class="card-body">
                                   <h4 class="card-title">Title</h4>
                                   <p class="card-text">Text</p>
                              </div>
                         </div>
                    </div>
               </div>';
               echo"iii";
          endwhile;endif;
     ?>
</main>





<?php get_footer(); ?>
