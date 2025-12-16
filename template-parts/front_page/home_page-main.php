<?php
$page_id = get_theme_mod( 'page_content' );

if ( $page_id ) :
    $page = get_post( $page_id );
    if ( $page ) :
      $title   = get_the_title( $page );
      $content = apply_filters( 'the_content', $page->post_content );
      $date    = get_the_date( '', $page );
      $thumbnail = get_the_post_thumbnail_url( $page, 'large' );
    ?>
    <section class="home_page scroll_margin">
      <div class="container">
        <div class="page_style">
          <?php if ( $thumbnail ) : ?>
            <div class="page_image">
              <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>">
            </div>
          <?php endif; ?>

          <h2><?php echo esc_html( $title ); ?></h2>
          <p class="page_date"><?php echo esc_html( $date ); ?></p>
          <?php echo $content; ?>
        </div>
      </div>
    </section>
    <?php
    endif;
endif;
?>
