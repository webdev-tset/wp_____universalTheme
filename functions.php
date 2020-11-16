<?php
// add_action('add_after_theme', function(){
//     add_theme_support('title-tag');
// },5);

require_once("walker/comment-walker.php");
require_once("options/apparence.php");

function addTag(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'en tete de menu');
    register_nav_menu('footer', 'dans le pied de page');

    add_image_size('card-header', 350, 215);
}
function ok_title($title){
    return "ok";
}
function title_parts($title){
    $title["title"]="ok||";
    $title['ok'] = "ouiiiiiii";
    // unset($title['tagline']);
    // var_dump($title);die();
    return $title;
}
add_filter("nav_menu_submenu_css_class", "ma_class_menu");
add_action('after_setup_theme', 'addTag', 6);
add_action('wp_enqueue_scripts', function(){
    // pour enregistrer le style;
    wp_register_style('b4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('b4');
    wp_register_script('b4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['bundler'], false, true);
    wp_deregister_script('jquery');
    wp_register_script('bundler', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', false, false, true);
    wp_enqueue_script('b4');
    wp_register_script('lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js', false, false, true);
    wp_enqueue_script('lodash');
});
add_action('init', function(){
    register_taxonomy('sport', 'post', [
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
    register_post_type('appartements', [
        'label' => 'Biens immo',
        'public' => true,
        'menu_position' => 2,
        'has_archive' => true,
        'supports' => ['thumbnail']
    ]);
});
add_filter('wp_title', 'ok_title');
// apply_filters("document_title_separator", " | "); // cette instructionb est censé être équivalente à la suivante
add_filter("document_title_separator", function(){return" | ";});
add_filter("document_title_parts", "title_parts");
add_filter("nav_menu_css_class", function ($classes){
    $classes[] = 'nav-item';
    return $classes;
});
add_filter("nav_menu_link_attributes", function ($attr){
    $attr['class'] = 'nav-link';
    return $attr;
});



function generate_pagination(){
    $pages=paginate_links(['type'=>'array']);
    if($pages == null)return;
    $active="active";
    echo'<nav aria-label="Page navigation">
    <ul class="pagination">';
    foreach($pages as $page){
        if(strpos($page,"current") === false)$rpl="";else $rpl=$active; 
        echo "<li class='page-item ${$rpl}'>".str_replace("page-numbers", "page-link", $page)."</li>";
    }
    echo'</ul></nav>';
}


require_once('metaboxes/sponso.php');
SponsoMetaBox::register();

require_once('options/agence.php');
AgenceMenuPage::register();



add_filter('manage_appartements_posts_columns', function($col){
    return [
        'cb' => $col['cb'],
        'thumbnail' => 'Miniature',
        'title' => $col['title'],
        'date' => $col['date'],
    ];
});
add_filter('manage_appartements_posts_custom_column', function($colname, $postid){
    if($colname === 'thumbnail'){
        the_post_thumbnail('thumbnail', $postid);
    }
}, 10, 2);
add_action('admin_enqueue_scripts', function(){
    wp_enqueue_style('admin_col_css', get_template_directory_uri().'/assets/css/admin.css');
});

add_filter('manage_post_posts_columns', function($col){
    $newcols = [];
    foreach($col as $k=>$v){
        if($k == 'date')
            $newcols['sponso'] = 'Article sponsorisé';
        $newcols[$k] = $v;
    }
    return $newcols;
});
add_filter('manage_post_posts_custom_column', function($colname, $postid){
    // if($colname === 'sponso'){
    //     the_post_thumbnail('thumbnail', $postid);
    // }
    echo get_post_meta($postid, SponsoMetaBox::META_KEY, true) == 0 ? 0 : get_post_meta($postid, SponsoMetaBox::META_KEY, true);
}, 10, 2);




function my_pre_get_posts(WP_Query $q){
    if(is_admin() || is_Home() || $q->is_main_query()){
        return;
    }
    $metaquery = $q->get('meta_query', []);
    $metaquery[] = [
        'key' => SponsoMetaBox::META_KEY,
        'compare' => 'EXISTS'
    ];
    $q->set('meta_query', $metaquery);
}
add_action('pre_post_posts', 'my_pre_get_posts');
add_filter('query_vars', function($params){
    $params[] = 'sponso';
    return $params;
});



require_once 'widgets/YoutubeWidget.php';
add_action('widgets_init', function(){
    register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'homepage',
        'name' => 'Sidebar Accueil',
        'before_widget' => '<div id="%1$s" class="p-4 %2$s"></div>',
        'after_widget' => "</div>",
        'before_title' => "<ok>",
        'after_title' => "</ok>"
    ]);
});


add_action('after_switch_theme', function(){
    wp_insert_term('Volleyball', 'sport');
    wp_insert_term('Natation', 'sport');

});