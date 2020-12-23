<?php 



// https://developer.wordpress.org/reference/functions/do_action/
// add_action('hook_tag', function(){}, false, false, false);
// https://developer.wordpress.org/reference/hooks/after_setup_theme/
add_action('after_setup_theme', function(){



// https://developer.wordpress.org/reference/functions/add_theme_support/
// https://developer.wordpress.org/reference/functions/get_theme_support/    add_theme_support('title-tag' );
    add_theme_support('html5');
    add_theme_support('post-thumbnails');
    add_theme_support('yoast-seo-breadcrumbs');//<--FROM AN yoast EXTENSION
    add_theme_support__wp_title();
    add_theme_support__custom_logo();
    // get_theme_support('custom-logo');

    // $ex = get_theme_support('post-thumbnails');
    // $ex = get_theme_support('custom-logo');


});
