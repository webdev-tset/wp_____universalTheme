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





//TROUVER UN HOOK SUR LEQUEL DEPLACER CES INSTRUCTIONS-------------------------------------------------
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



        
        // MODIFIER LE CODE HTML VIA UN WALKER: 
        //GO TO:        C:\wamp64\www\_\ejlpt\wp-includes\class-walker-nav-menu.php
        // AJOUTER DES CLASSES CSS: https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
        //https://www.google.com/search?q=wp_list_categorie&rlz=1C1CHBF_frFR921FR921&oq=wp_list_categorie&aqs=chrome..69i57j69i60.228j0j7&sourceid=chrome&ie=UTF-8
        add_filter('nav_menu_css_class', function(){
            return ['uneclassecss___ '];
        });
        // AJOUTER DES ATTRIBUTS HTML: https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
        //https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
        add_filter('nav_menu_link_attributes', function($atts){
            $atts['data-attr'] = ['unattributcss___ '];
            return $atts;
        });
        register_nav_menus([
            'navbar' => __( 'Menu prinicpal', 'navbar-menu' ),
            'nav' => __( 'Menu de navigation', 'nav-menu' ),
            'footer' => __( 'Lenu du pied de page', 'footer-menu' ),
        ]);
        // register_nav_menu('header', 'en tete de menu');
        // THEN CALL wp_nav_menu() WHERE YOU WANT YOUR REGISTERED MENU TO BE OUTPUT
        // https://developer.wordpress.org/reference/functions/wp_nav_menu%20start_lvl%20never%20clled/
//TROUVER UN HOOK SUR LEQUEL DEPLACER CES INSTRUCTIONS-------------------------------------------------





        
        add_action('widgets_init', function(){
            // register_widget(YoutubeWidget::class);
            register_sidebar([
                'id' => 'homepage',
                'name' => 'Sidebar Accueil',
                'before_widget' => '<div id="%1$s" class="p-4 %2$s"></div>',
                'after_widget' => "</div>",
                'before_title' => "<ok>",
                'after_title' => "</ok>"
            ]);
            register_sidebar([
                'id' => 'homepage_',
                'name' => 'sidebar2',
                'before_widget' => '<div id="%1$s" class="p-4 %2$s"></div>',
                'after_widget' => "</div>",
                'before_title' => "<ok>",
                'after_title' => "</ok>"
            ]);
        });




        //https://developer.wordpress.org/reference/hooks/init/
        add_action('init', function(){
            //https://developer.wordpress.org/reference/functions/register_taxonomy/
            register_taxonomy('sport', 'post', [
                // labels: https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
                'labels' => [
                    'name' => 'Sport',
                    'singular_name' => 'Sport',
                    'plural_name' => 'Sports',
                    'search_items' => 'Rechercher des sports',
                    'all_item' => 'Tous les sport',
                    'edit_item' => 'Editer le sport',
                    'update_item' => 'Mettre à jour le sport',
                    'add_new_item' => 'Ajouter un nouveau sport',
                    'new_item_name' => 'Ajouter un nouveau sport',
                    'menu_name' => 'Sport',
                ],
                'description' => 'fuck yall',
                'show_in_rest' => true,
                'hierarchical' => true
            ]);
            // register_post_type('appartements', [
            //     'label' => 'Biens immo',
            //     'public' => true,
            //     'menu_position' => 2,
            //     'has_archive' => true,
            //     'supports' => ['thumbnail']
            // ]);
        });

        
