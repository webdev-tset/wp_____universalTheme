<?php // REGISTER STYLES AND SCRIPTS FIRST
//------------------------------------------
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

        





/****************************************************************************************************  */
/****************************************************************************************************  */
/****************************************************************************************************  */






        add_image_size('article_header', null, 75);
        /*
        https://developer.wordpress.org/reference/functions/the_post_thumbnail/
        //Default WordPress
        the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
        the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
        the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
        the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
        the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
        */



        
        
