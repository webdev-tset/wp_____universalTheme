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




  
  <!-- https://codex.wordpress.org/Pagination -->
  <!-- https://developer.wordpress.org/themes/functionality/pagination/ -->
    <nav class="ariane container">
        <div class="ariane__paginationBefore">
            <!-- 3 DIFFERENT OPTIONS ARE AVAILABLE FOR PAGINATION: 
            - paginate_links()   =>   A HELPER THAT echo ALL THE PAGINATION IN AN <ul/> (most configurable option, an helper can be added for customizing purpose)
            - get_the_posts_pagination()   =>   A HELPER THAT echo ALL THE PAGINATION WITH AN ASSOCIATED wp COMPONENT (nav>h2.screen-reader-text+div.nav-links>a*(2+nbre de pages)) (3 CONFIGURATOIN AVAOILABLE ONLY)
            - get_previous_posts_link()   =>   A HELPER echo ONLY 'previous' AND 'after' ANCHOR TAGS (only the label of the anchor is configurable)
            -->
<!--div class="echo">
    <?php/*https://developer.wordpress.org/reference/functions/paginate_links/ */?>
    <?=paginate_links([
        // 'base'=>'',
        // 'format'=>'',
        // 'total'=>'',
        // 'current'=>'',
        // 'aria_current'=>'',
        // 'show_all'=>'',
        // 'end_size'=>'',
        // 'mid_size'=>'',
        // 'prev_next'=>'',
        // 'prev_text'=>'',
        // 'next_text'=>'',
        // 'type'=>'',
        // 'add_args'=>'',
        // 'add_fragment'=>'',
        // 'before_page_number'=>'',
        // 'after_page_number'=>''
    ])?>
</div>
<div class="getter">
    <?php/*https://developer.wordpress.org/reference/functions/get_the_posts_pagination/
        https://developer.wordpress.org/reference/functions/the_posts_pagination/ */?>
    <?php get_the_posts_pagination(['screen_reader_text'=>"Mon titre de pagination personnalisé"]); ?>
</div>
<hr>
<div class="granular">
    <?php/*https://developer.wordpress.org/reference/functions/get_the_posts_pagination/ 
        https://developer.wordpress.org/reference/functions/the_posts_pagination/ */?>
    <?=get_previous_posts_link('<') ? str_replace("href", "class='ok' href", get_previous_posts_link('<')) : "void" ?>
    <?=get_next_posts_link('>') ?? "void" ?>
</div>
<hr/-->
            <?=get_previous_posts_link('<') ? add_attr(get_previous_posts_link('<'), ["class"=>'ok', "title"=>"Page précédente"]) : "void" ?>
            | 
            <form method="POST" action="page_to_create.php">
                <input type="hidden" value="a json of all data that would give all information about this page and let page_to_create.php decide what to render" />
                <fieldset>
                    <label for="pagination_choose">...ou choisir un page</label>
                    <input id="pagination_choose" name="pagination_choose" type="text" />
                </fieldset>
                <fieldset>
                    <input type="submit">
                </fieldset>
            </form>
        </div>
        <ol id="ariane__breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Library
            </li>
        </ol>
        <div class="date_viewer"></div>
        <div class="color_picker">permettre au user de choisir une couleur pour modifier le theme en temps reel</div>
        <div class="ariane__paginationAfter">
            <?=get_next_posts_link('>') ?? "void" ?>
        </div>
    </nav>
    
    