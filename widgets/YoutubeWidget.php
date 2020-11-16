<?php 
class YoutubeWidget extends WP_Widget {
    public function __construct(){
        parent::__construct('youtube_widget', 'Youtube Widget');
    }
    public function widget($args, $instance){
        echo $args['before_widget'];
        echo $args['after_title'];
        echo "<h3>".$instance['title']."</h3>";
        echo'<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$instance['youtube'].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo $args['before_title'];
        echo $args['after_widget'];
    }
    public function form($instance){
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>">Titre</label>
            <input 
                class="widefat"
                value="<?= esc_attr($instance['title']??'okplok') ?>"
                name="<?= $this->get_field_name('title') ?>"
            />
        </p>
        <p>
            <label for="<?= $this->get_field_id('youtube'); ?>">Youtube ID video</label>
            <input 
                class="widefat"
                value="<?= esc_attr($instance['youtube']??'---') ?>"
                name="<?= $this->get_field_name('youtube') ?>"
            />
        </p>
        <?php
    }
    public function update($new, $oldInstance){
        return $new;
    }
}