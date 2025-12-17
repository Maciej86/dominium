<?php
function dominium_custom_homepage_page_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $wp_customize->add_section( "homepage_page", array(
    "title"       => __( "Sekcja - Strona", "dominium" ),
    "description" => __( "Ustawienia sekcji Strona na stronie głównej.", "dominium" ),
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

  // Page border
  $wp_customize->add_setting( 'page_border', array(
    'default'           => $defaults['home_page']['border'],
    'sanitize_callback' => 'dominium_sanitize_border_home_page',
  ));

  $wp_customize->add_control( 'page_border', array(
    'label' => __( 'Obramowanie', 'dominium' ),
    'section' => 'homepage_page',
    'type' => 'select',
    'choices' => array(
      'none' => __( 'Brak', 'dominium' ),
      'top' => __( 'U góry', 'dominium' ),
      'bottom' => __( 'Na dole', 'dominium' ),
      'top-bottom' => __( 'U góry i na dole', 'dominium' ),
    ),
    "description" => __( "Wybierz obramowanie dla tej sekcji", "dominium" ),
    ));

    // Page background color
    $wp_customize->add_setting( 'page_background_color', array(
      'default'           => $defaults['home_page']['background_color'] ?? '',
      'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'page_background_color',
        array(
          'label'       => __( 'Kolor tła', 'dominium' ),
          'section'     => 'homepage_page',
          'description' => __( 'Wybierz kolor tła dla sekcji Strona', 'dominium' ),
        )
      )
    );
}
add_action( "customize_register", "dominium_custom_homepage_page_support" );

function dominium_sanitize_border_home_page( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'none', 'top', 'bottom', 'top-bottom' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['home_page']['border'];
}
function dominium_sanitize_orientation_home_page( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'vertical', 'horizontall', );
  return in_array( $value, $allowed, true ) ? $value : $defaults['home_page']['orientation'];
}
?>