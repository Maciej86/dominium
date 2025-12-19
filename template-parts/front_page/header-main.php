<?php
  $defaults = require get_template_directory() . "/inc/theme-defaults.php";

  $header_height = get_theme_mod("header_height", $defaults["header"]["height"]);
  $header_margin_top = get_theme_mod("header_margin_top", $defaults["header"]["margin_top"]);
  $header_title = get_theme_mod("header_title", $defaults["header"]["title"]);
  $header_subtitle = get_theme_mod("header_subtitle", $defaults["header"]["subtitle"]);
  $header_description = get_theme_mod("header_description", $defaults["header"]["description"]);
  $header_background_image = get_theme_mod("header_background_image", $defaults["header"]["background_image"]);
?>

<header 
  class="header js-image-background" 
  data-image="<?php echo esc_url( $header_background_image ); ?>"
  style="--header-height: <?php echo esc_html( $header_height ); ?>px;"
>
  <div class="container">
    <div 
      class="header__content" 
      style="--header-margin-top: <?php echo esc_html( $header_margin_top ); ?>px;"
    >
      <h1 class="header__content__title"><?php echo esc_html( $header_title ); ?></h1>

      <?php if ( !empty( $header_subtitle ) ) : ?>
        <p class="header__content__subtitle"><?php echo esc_html( $header_subtitle ); ?></p>
      <?php endif; ?>

      <?php if ( !empty( $header_description ) ) : ?>
        <p class="header__content__description"><?php echo esc_html( $header_description ); ?></p>
      <?php endif; ?>

      <div class="header__content__buttons">
        <?php

          foreach ( $defaults['header']['buttons'] as $i => $button )  :
            $text = get_theme_mod( "header_button_text_$i", $button["text"] );
            $url  = get_theme_mod( "header_button_url_$i", $button["url"] );

            if ( $text && $url ) : 
              ?>
                <a href="<?php echo esc_url( $url ); ?>" class="header__content__button">
                  <?php echo esc_html( $text ); ?>
                </a> 
              <?php
            endif;
          endforeach;
          
        ?>
      </div>
    </div>
  </div>
</header>