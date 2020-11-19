

<?php

include('parts/wp_title.php');
include('parts/custom-logo.php');


$theme_support_values = ['post-formats', 'post-thumbnails', 'custom-header', 'custom-background', 'custom-logo', 'menus', 'automatic-feed-links', 'html5', 'title-tag', 'customize-selective-refresh-widgets', 'starter-content', 'responsive-embeds', 'align-wide', 'dark-editor-style', 'disable-custom-colors', 'disable-custom-font-sizes', 'editor-color-palette', 'editor-font-sizes', 'editor-styles', 'wp-block-styles', 'core-block-patterns'];



// https://developer.wordpress.org/reference/functions/do_action/
// add_action('hook_tag', function(){}, false, false, false);
// https://developer.wordpress.org/reference/hooks/after_setup_theme/
add_action('after_setup_theme', function(){



// https://developer.wordpress.org/reference/functions/add_theme_support/
// https://developer.wordpress.org/reference/functions/get_theme_support/    add_theme_support('title-tag' );
    add_theme_support('html5');
    add_theme_support('post-thumbnails');
    add_theme_support__wp_title();
    add_theme_support__custom_logo();


    // $ex = get_theme_support('post-thumbnails');
    // $ex = get_theme_support('custom-logo');


});





