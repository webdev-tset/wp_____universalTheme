<?php

    add_action('after_setup_theme', function(){
        wp_enqueue_style('b4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        wp_enqueue_scripts('lo', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js', false, false, true);
    }); 


    