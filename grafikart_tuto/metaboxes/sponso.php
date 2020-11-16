<?php

class SponsoMetaBox {

    const META_KEY = 'sponso';

    public static function register(){
        add_action("add_meta_boxes", [self::class, 'add'], "default", 2);
        add_action("save_post", [self::class, 'save']);
    }
    public static function add($x, $post){
        if($x == 'post' && current_user_can( 'edit_posts' ))
            add_meta_box("meta_".self::META_KEY, "this is a Sponsoring", [self::class, "render"], "post", "side","default",$post->ID);
    }
    public static function render($post){
        $postID = get_post_meta($post->ID, self::META_KEY, true);
        ?>
        <input type="hidden" name="<?php self::META_KEY ?>" value="0" />
        <input value="<?php get_the_ID(); ?>" readonly />
        <label for="<?php self::META_KEY ?>">Cet article est sponsorisé ?</label>
        <input type="checkbox" name="<?php self::META_KEY ?>" 
                value="<?php echo $postID ?>" 
                <?php if($postID == "1")echo"checked"; ?> 
        />
        <hr>
        <input id="post_ID_" value="" readonly>
        <script>$=jQuery;$('#post_ID_')[0].value = $('#post_ID').val()+": est l'identifiant de cette article";</script>
        <?php
    }
    public static function save($post_id){
        if(array_key_exists(self::META_KEY, $_POST) && current_user_can( 'edit_posts' )){
            if($_POST[self::META_KEY] == "0"){
                delete_post_meta($post_id, self::META_KEY);
                // return delete_metadata( 'post', $post_id, self::META_KEY );
            }else{
                update_post_meta($post_id, self::META_KEY, 1);
            }
        }
    }
}