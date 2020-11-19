<?php 

        //https://developer.wordpress.org/themes/functionality/custom-logo/
        //get_custom_logo() - Returns markup for a custom logo.
        // the_custom_logo() - Displays markup for a custom logo.
        // has_custom_logo() - Returns a boolean true/false, whether a custom logo is set or not.
        function add_theme_support__custom_logo(){
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 100,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ));
    }