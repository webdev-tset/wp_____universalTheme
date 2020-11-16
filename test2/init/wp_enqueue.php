


<?php
     add_action('wp_enqueue_scripts', function(){
          wp_enqueue_style('b4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
          wp_enqueue_style('index_0', get_template_directory_uri(). '/assets/index.css');
          wp_enqueue_script('index_0', get_template_directory_uri(). '/assets/index.js');
     });


