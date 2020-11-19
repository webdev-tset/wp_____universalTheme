tennis <hr>
    <?=the_terms(get_the_ID(), 'sport') ?>
    <?= wp_list_categories(['taxonomy'=>'sport', 'title_li'=>'titre de wp_list_cat']); ?>
    <?php $terms=get_terms([
        'taxonomy' => 'sport', //empty string(''), false, 0 don't work, and return empty array
        /*
        'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
        'orderby' => 'name',            'order' => 'ASC',            'hide_empty' => true, //can be 1, '1' too
        'include' => 'all', //empty string(''), false, 0 don't work, and return empty array
        'exclude' => 'all', //empty string(''), false, 0 don't work, and return empty array
        'exclude_tree' => 'all', //empty string(''), false, 0 don't work, and return empty array
        'number' => false, //can be 0, '0', '' too
        'offset' => '',            'fields' => 'all',            'name' => '',            'slug' => '',            'hierarchical' => true, //can be 1, '1' too
        'search' => '',            'name__like' => '',            'description__like' => '',            'pad_counts' => false, //can be 0, '0', '' too
        'get' => '',            'child_of' => false, //can be 0, '0', '' too
        'childless' => false,            'cache_domain' => 'core',            'update_term_meta_cache' => true, //can be 1, '1' too
        'meta_query' => '',            'meta_key' => array(),            'meta_value'=> '',
        */
    ]);
    foreach($terms as $t){
        ?><p><?php echo$t->term_id;
        echo$t->name;
        the_terms(get_the_ID(), 'sport');
        var_dump(is_tax($t->taxonomy, $t->term_id));
        echo"<a href='".get_term_link($t)."'>$t->name ---_ </a><br/>";
        the_terms(get_the_ID(get_the_ID()), 'sport')
        ?></p><?php
    }
    var_dump($terms);