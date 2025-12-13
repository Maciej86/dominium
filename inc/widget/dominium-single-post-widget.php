<?php
class Dominium_Single_Post_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dominium_single_post_widget',
            __('Wpis: pojedynczy post', 'dominium'),
            ['description' => __('Wyświetla tytuł, datę, zajawkę i miniaturkę wybranego wpisu lub strony', 'dominium')]
        );
    }

    public function widget($args, $instance) {
        $post_id    = !empty($instance['post_id']) ? intval($instance['post_id']) : 0;
        $show_date  = !empty($instance['show_date']);
        $show_thumb = !empty($instance['show_thumb']);
        $hide_current = !empty($instance['hide_current']); // nowa opcja

        if (!$post_id) return;

        // Ukryj widget jeśli wybrany post to aktualny wpis/strona i opcja włączona
        $current_id = (int) get_queried_object_id();
        if ($hide_current && $current_id && $current_id === $post_id) return;

        $post = get_post($post_id);
        if (!$post) return;

        setup_postdata($post);

        echo $args['before_widget'];
        echo '<div class="widget_post">';

        if ($show_thumb && has_post_thumbnail($post_id)) {
            echo '<div class="widget_post__thumb">';
            echo get_the_post_thumbnail($post_id, 'medium');
            echo '</div>';
        }

        echo '<h3 class="widget_post__title">';
        echo '<a href="' . esc_url(get_permalink($post_id)) . '">' . esc_html(get_the_title($post_id)) . '</a>';
        echo '</h3>';

        if ($show_date) {
            echo '<p class="widget_post__date">' . esc_html(get_the_date('', $post_id)) . '</p>';
        }

        $content_parts = get_extended($post->post_content);
        $excerpt = wp_strip_all_tags($content_parts['main']); // only <!--more-->
        echo '<p class="widget_post__excerpt">' . esc_html($excerpt) . '</p>';

        echo '<a href="' . esc_url(get_permalink($post_id)) . '" class="button_link">czytaj więcej</a>';

        echo '</div>';
        echo $args['after_widget'];

        wp_reset_postdata();
    }

    public function form($instance) {
        $post_id      = !empty($instance['post_id']) ? intval($instance['post_id']) : '';
        $show_date    = !empty($instance['show_date']);
        $show_thumb   = !empty($instance['show_thumb']);
        $hide_current = !empty($instance['hide_current']); // nowa opcja

        $posts = get_posts([
            'post_type'   => ['post', 'page'],
            'numberposts' => -1,
            'post_status' => 'publish',
            'orderby'     => 'title',
            'order'       => 'ASC',
        ]);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('post_id'); ?>"><?php _e('Wybierz wpis lub stronę:'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_id'); ?>" name="<?php echo $this->get_field_name('post_id'); ?>">
                <option value="0"><?php _e('— Wybierz —', 'dominium'); ?></option>
                <?php foreach ($posts as $p) : ?>
                    <option value="<?php echo esc_attr($p->ID); ?>" <?php selected($post_id, $p->ID); ?>>
                        <?php echo esc_html($p->post_title); ?> (<?php echo esc_html($p->post_type); ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
            <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Pokaż datę'); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_thumb); ?> id="<?php echo $this->get_field_id('show_thumb'); ?>" name="<?php echo $this->get_field_name('show_thumb'); ?>" />
            <label for="<?php echo $this->get_field_id('show_thumb'); ?>"><?php _e('Pokaż miniaturkę'); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($hide_current); ?> id="<?php echo $this->get_field_id('hide_current'); ?>" name="<?php echo $this->get_field_name('hide_current'); ?>" />
            <label for="<?php echo $this->get_field_id('hide_current'); ?>"><?php _e('Ukryj ten wpis, jeśli jesteś na jego stronie'); ?></label>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['post_id']      = !empty($new_instance['post_id']) ? intval($new_instance['post_id']) : 0;
        $instance['show_date']    = !empty($new_instance['show_date']) ? 1 : 0;
        $instance['show_thumb']   = !empty($new_instance['show_thumb']) ? 1 : 0;
        $instance['hide_current'] = !empty($new_instance['hide_current']) ? 1 : 0; // nowa opcja
        return $instance;
    }
}

function dominium_register_widgets() {
    register_widget('Dominium_Single_Post_Widget');
}
add_action('widgets_init', 'dominium_register_widgets');
?>
