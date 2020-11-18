<?php

    add_action('after_setup_theme', function(){
        wp_enqueue_style('b4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        wp_enqueue_scripts('lo', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js', false, false, true);
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    });
    // die(get_cat_name(get_the_ID()));
    // if(has_category("ok cat"))die("ouiiiiiiiiiii");else die("nonooooooooooooooooon");
    add_filter('wp_title', function($x, $y){
        $title="";$b="";
        $a=get_the_category(get_the_ID(), ['fields'=>'names']);
        foreach($a as $k=>$v){
            // $b.=$v.' xxx ';
            // $b .= get_category($v)->name.' xxx ';
            if(has_category(get_category($v)->term_id)){$title="ouii cat ok";}
            else $title="yoyoyo";
        }
        if(is_singular()){}
        elseif(is_single()){}
        elseif(is_page()){}
        elseif(has_category($b)){$title="ouii cat ok";}
        return ['title'=>$title];
    },100,2);
    add_filter('pre_get_document_title', function($x){
        return 'ppp';
    },100,2);
    add_filter('document_title_separator', function($x){
        return 'ppp';
    },100,2);
    add_filter('document_title_parts', function($x){
        $x['tagline'] = '_____soukaaa??_____';
        return$x;
        // var_dump($x);
        // die();
    },10,2);
    
    