<?php
add_action('customize_register', function(WP_Customize_Manager $manager){
    $manager->add_section('mon_apparence', [
        'title' => 'Personnalisation de l\'apparence.'
    ]);

    $manager->add_setting("header_background", [
        'default' => "#FF0F0F"
    ]);

    $manager->add_control(new WP_Customize ($manager, 'header_background', [
        'section' => 'mon_apparence',
        'label' => 'Couleur de l\'entete'
    ]));
    // $manager->add_control('header_background', [
    //     'section' => 'mon_apparence',
    //     'setting' => 'ctrl_header_background',
    //     'label' => 'Couleur de l\'entete'
    // ]);
});