<?php

require_once('funcs.php');
require_once('walkers/nav_menu.php');



/****
 * 
 ****/



    include('getters/global.php');



/****
 * 
 ****/



    include('init/theme_support.php');
    include('init/wp_register.php');
    include('init/other_hooks.php');





   // add_filter( 'body_class', function( $classes ) {
   //    if ( is_page_template( 'page-example.php' ) ) {
   //        $classes[] = 'example';
   //    }
   //    if (in_array('class-to-remove', $classes)) {
   //       unset( $classes[array_search('class-to-remove', $classes)] );
   //    }
   //    else$classes[] = 'class-name';
   //    return $classes;
   // });
   function wp_body_classes( $classes ) {
      $classes[] = 'class-name';
        
      return $classes;
  }
  add_filter( 'body_class','wp_body_classes' );