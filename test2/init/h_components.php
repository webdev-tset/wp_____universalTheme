<?php


     // register_nav_menu( 'navbar', __( 'Primary Menuu', 'theme-slug' ) );
     register_nav_menus([
          'navbar' => __( 'Primary Menuu', 'theme-slug' ),
     ]);

     
// C:\wamp64\www\_\ejlpt\wp-includes\class-walker-nav-menu.php
// https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
// https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
// LES FILTRE DU walker, FICHIER: "C:\wamp64\www\_\ejlpt\wp-includes\class-walker-nav-menu.php"
     add_filter('nav_menu_css_class', function(){return ['uneclassecss___ '];});
     // add_filter('nav_menu_link_attributes', function(){return ['okok' => 'uneclassecss___ '];});
     


     
