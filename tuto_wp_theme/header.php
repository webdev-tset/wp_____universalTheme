<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        /****
         * https://developer.wordpress.org/reference/hooks/wp_title/
         * https://developer.wordpress.org/reference/functions/get_bloginfo/
         */
        // code something like this: (depreciated)
            //echo wp_title(' | ', true, "right"); 
        //or code something like that: 
            //echo "just put nothing and ride html title tag output through filter hooks in the functions.php file :p"
    ?></title>
    <?php wp_head() ?>
</head>
<body>
    <header class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <?php
            // https://developer.wordpress.org/reference/functions/the_custom_logo/
            // echo the_custom_logo();
            // echo get_custom_logo();
            //---//
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'thumbnail' );
            echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
        ?>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <?= 
                // https://developer.wordpress.org/reference/functions/wp_nav_menu%20start_lvl%20never%20clled/
                wp_nav_menu([
                    'theme_location' => 'navbar', 
                    'container' => false,// 'container_id' => '','container_class' => '',
                    'items_wrap' => '<menu id="mon_navbar%1$s" class="%2$s navbar-nav mr-auto">
                        %3$s
                    </menu>',
                    // 'menu_id' => 'mon_navbar',
                    // 'menu_class' => 'navbar-nav mr-auto',
                    'walker' => new Mon_Walker_Nav_Menu,
                    // 'fallback_cb' => function(){echo"...no menu available yet...";},
                ]); 


                get_search_form();

                
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>
        </div>
    </header>