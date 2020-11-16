<?php

class AgenceMenuPage {
    const GROUP = 'agence_options';
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }
    public static function addMenu(){
        add_options_page("Gestion de l'agence", "Agence", "manage_options", self::GROUP, [self::class, 'render']);
    }
    public static function registerSettings(){
        register_setting(self::GROUP, 'agence_horaire', ['default' => 'Salut']);
        register_setting(self::GROUP, 'agence_date', ['default' => 'my default datepicker value...']);
        add_settings_section("agence_section_1", "Paramètres", function(){
            echo "yooooooooooooo";
        }, self::GROUP);
        add_settings_field("agence_field_1", "Horaires ouvertures", function(){
            ?>
                <textarea name="agence_horaire" cols="30" rows="10"><?= get_option('agence_horaire'); ?></textarea>
            <?php
        }, self::GROUP, "agence_section_1");
        add_settings_field("agence_field_date", "Dates ouvertures", function(){
            ?>
                <input name="agence_date" value="<?= get_option('agence_date'); ?>" class="myDatepicker" />
            <?php
        }, self::GROUP, "agence_section_1");
    }
    public static function registerScripts($suffix){
        if($suffix == "settings_page_agence_options"){
            wp_register_style('flatpicker', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css');
            wp_register_script('flatpicker', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js', [], false, true);
            wp_enqueue_script('myadminscript', get_template_directory_uri().'/assets/js/admin.js', ['flatpicker'], false, true);
            wp_enqueue_style('flatpicker');
        }
    }
    public static function render(){
        ?>
            <h2>Gestion Agence</h2>
            <p><?= get_current_screen()->id; ?></p>
            <hr/>
            <p><?= get_option('agence_horaire') ?></p>
            <form action="options.php" method='post'>

                <?php settings_fields(self::GROUP) ?>
                <?php do_settings_sections(self::GROUP) ?>
                <?php submit_button() ?>
            </form>
        <?php
    }
}