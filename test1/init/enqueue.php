<?php

// https://developer.wordpress.org/reference/functions/do_action/
// add_action('hook_tag', function(){}, false, false, false);
// https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
     add_action('wp_enqueue_scripts', function(){
          //...more: https://developer.wordpress.org/reference/functions/wp_enqueue_scripts/


// https://developer.wordpress.org/reference/functions/wp_register_style/
// https://developer.wordpress.org/reference/functions/wp_register_script/
// https://developer.wordpress.org/reference/functions/wp_enqueue_style/
// https://developer.wordpress.org/reference/functions/wp_enqueue_script/
          // wp_register_style('index_0', get_template_directory_uri().'/assets/index.css');
          wp_enqueue_style('b4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
          wp_enqueue_style('index_0', get_template_directory_uri().'/assets/index.css');
          // wp_register_script('index_0', get_template_directory_uri().'/path/to/file.js', false, false, true);
          wp_enqueue_script('index_0', get_template_directory_uri().'/assets/index.js');







     });

