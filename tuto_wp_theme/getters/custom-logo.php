<?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
?>

<a href="#">
    <img src="<?=esc_url( $custom_logo_url )?>" alt="">
</a>
