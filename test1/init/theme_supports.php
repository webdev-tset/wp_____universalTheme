

<?php

     $theme_support_values = ['post-formats', 'post-thumbnails', 'custom-header', 'custom-background', 'custom-logo', 'menus', 'automatic-feed-links', 'html5', 'title-tag', 'customize-selective-refresh-widgets', 'starter-content', 'responsive-embeds', 'align-wide', 'dark-editor-style', 'disable-custom-colors', 'disable-custom-font-sizes', 'editor-color-palette', 'editor-font-sizes', 'editor-styles', 'wp-block-styles', 'core-block-patterns'];



// https://developer.wordpress.org/reference/functions/do_action/
// add_action('hook_tag', function(){}, false, false, false);
// https://developer.wordpress.org/reference/hooks/after_setup_theme/
     add_action('after_setup_theme', function(){
          echo"---action:after_setup_theme---<br/>";



// https://developer.wordpress.org/reference/functions/add_theme_support/
          add_theme_support('title-tag' );
          add_theme_support('html5');



          add_theme_support( 'custom-logo', array(
               'height'      => 100,
               'width'       => 400,
               'flex-height' => true,
               'flex-width'  => true,
               'header-text' => array( 'site-title', 'site-description' ),
          ));



     });

     
// https://developer.wordpress.org/reference/functions/add_filter/
// add_filter('hook_tag', function(){}, 10, 1);
// https://developer.wordpress.org/reference/hooks/wp_title/
     add_filter('wp_title', function($title, $sep, $sepp){
          echo"---filtre:wp_title---<br/>";
          echo"yoo ";
          return $title." yo j'ai hacké wp_title nigro "+$sep;



     }, 10, 1);

// https://developer.wordpress.org/reference/hooks/pre_get_document_title/
     add_filter('pre_get_document_title', function($title){
          echo"---filtre:pre_get_document_title---<br/>";
          echo$title;
          return $title;



     }, 10, 1);  // Filters the document title before it is generated.

// https://developer.wordpress.org/reference/hooks/document_title_separator/
     add_filter('document_title_separator', function($sep){
          echo"---filtre:document_title_separator---<br/>";
          return" ||mySeperator|| ";


     }, 10, 1);     



// https://developer.wordpress.org/reference/hooks/document_title_parts/
     add_filter('document_title_parts', function($title){
          echo"---filtre:document_title_parts---<br/>";
          var_dump($title);
          return $title;


     }, 10, 1);



