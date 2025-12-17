<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';

$page_id = get_theme_mod('page_content');
$border = get_theme_mod('page_border', $defaults['home_page']['border']);
$background_color = get_theme_mod('page_background_color', $defaults['home_page']['background-color']);

if ( $page_id ) :
    $page = get_post( $page_id );
    if ( $page ) :
      $content = apply_filters( 'the_content', $page->post_content );
      $slug = sanitize_title( $title );
    ?>

    <section 
      id="<?php echo esc_attr( $slug ); ?>" 
      class="home_page border-<?php echo $border ?> scroll_margin"
      style="background-color: <?php echo $background_color ?>"
    >
      <div class="container page_style">
        <?php echo $content; ?>
      </div>
    </section>
    <?php
    endif;
endif;
?>
