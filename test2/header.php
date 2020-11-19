<?php

     use MonNamespace\Mon_Walker_Nav_Menu;


?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <?php wp_head() ?>
     </head>
     <body>
          <header id="header">
               <navbar></navbar>
               <nav class="navbar navbar-expand-sm navbar-light bg-light">
                    <a class="navbar-brand" href="#">eJLPT</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                              <li class="nav-item active">
                                   <a class="nav-link" href="<?= get_home_url() ?>">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="<?= get_home_url() ?>/articles">Articles</a>
                              </li>
                         </ul>



                         <?= 
                              // https://developer.wordpress.org/reference/functions/wp_nav_menu%20start_lvl%20never%20clled/
                              wp_nav_menu([
                                   'theme_location' => 'navbar', 
                                   'container' => false,// 'container_id' => '','container_class' => '',
                                   'items_wrap' => '<menu id="mon_navbar%1$s" class="%2$s navbar-nav mr-auto">
                                        %3$s
                                   </menu>',
                                   // 'menu_id' => 'mon_navbar',
                                   // 'menu_class' => 'navbar-nav mr-auto',
                                   'walker' => new Mon_Walker_Nav_Menu,
                                   'fallback_cb' => function(){echo"...no menu available yet...";},
                              ]); 
                         ?>
                         
                         
                         
                         <form class="form-inline my-2 my-lg-0">
                              <input class="form-control mr-sm-2" type="text" placeholder="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                         </form>
                    </div>
               </nav>
          </header>


