<?php 


    function add_theme_support__wp_title($config = ['v'=>false,'pre_get_document_title'=>'___pre_get_document_title___','document_title_separator'=>'___document_title_separator____','document_title_parts'=>'___document_title_parts___']){
        if($config['v'])die("parameter \$config = ['v'=>false,'pre_get_document_title'=>'___pre_get_document_title___','document_title_separator'=>'___document_title_separator____','document_title_parts'=>'___document_title_parts___']");

// https://developer.wordpress.org/reference/hooks/wp_title/
        add_filter('wp_title', function($x, $y){
            $custom_title="";
            $post_categories=get_the_category(get_the_ID(), ['fields'=>'names']);
            foreach($post_categories as $k=>$v){
                if(has_category(get_category($v)->term_id))
                $custom_title="ouii cat ok";
                else $custom_title="yoyoyo";
            }
            if(is_singular()){}
            elseif(is_single()){}
            elseif(is_page()){}
            return ['title'=>$custom_title];
        },20,2);
// https://developer.wordpress.org/reference/hooks/pre_get_document_title/
        add_filter('pre_get_document_title', function($config){
            return /*$config[*/'pre_get_document_title'/*]*/;
        },20,2);
// https://developer.wordpress.org/reference/hooks/document_title_separator/
        add_filter('document_title_separator', function($config){
            return /*$config[*/'document_title_separator'/*]*/;
        },20,2);
// https://developer.wordpress.org/reference/hooks/document_title_parts/
        add_filter('document_title_parts', function($parts){
            $parts['tagline'] = $parts['document_title_parts'];
            return$parts;
        },20,2);
    }



    