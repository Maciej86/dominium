<?php
function dominium_style_post_panel( $wp_customize ) {
  
  $wp_customize->add_panel( 'style_post_panel', array(
    'title'       => __( 'Ustawienia styli wpisów', 'dominium' ),
    'description' => __( 'Konfiguruj wygląd wyświetlania postów w kategoriach', 'dominium' ),
    'priority'    => 50,
  ));
}
add_action( 'customize_register', 'dominium_style_post_panel' );
