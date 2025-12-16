<?php
function dominium_custom_homepage_page_support( $wp_customize ) {

  $wp_customize->add_section( "homepage_page", array(
    "title"       => __( "Sekcja - Strona", "dominium" ),
    "description" => __( "Ustawienia sekcji Strona na stronie głównej", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 70,
  ));

  // Page data contact
  $wp_customize->add_setting( 'page_content', array(
    'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control( 'page_content', array(
    'label'   => __( 'Strona do wyświetlenia', 'dominium' ),
    'section' => 'homepage_page',
    'type'    => 'dropdown-pages',
  ));
}
add_action( "customize_register", "dominium_custom_homepage_page_support" );
?>