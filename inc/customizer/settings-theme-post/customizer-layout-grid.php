<?php
function dominium_style_layout_grid_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $wp_customize->add_section( 'style_layout_grid_post', array(
    'title'       => __( 'Edycja wpisów typu "Siatka" ', 'dominium' ),
    'description' => __( 'Zmień wygląd wpisu w kategorii, dla której przypisano styl "Siatka" ', 'dominium' ),
    "panel"       => "style_post_panel",
    'priority'    => 10,
  ));

    // Background color
    $wp_customize->add_setting("layout_grid_background", array(
      'default'           => $defaults['settings_layout_grid']['background'],
      'sanitize_callback' => 'dominium_sanitize_layout_grid_background',
    ));
  
    $wp_customize->add_control("layout_grid_background_control", array(
      'label'    => __( 'Włącz/Wyłącz tło', 'dominium' ),
      'section'  => 'style_layout_grid_post',
      'settings' => 'layout_grid_background',
      'type'     => 'checkbox',
      "description" => __( "Kolor tła zostanie ustawiony zgodnie z kolorystyką całego motywu.", "dominium" ),
    ));

  // Position title
  $wp_customize->add_setting("layout_grid_title", array(
    'default'           => $defaults['settings_layout_grid']['title'],
    'sanitize_callback' => 'dominium_sanitize_layout_grid_title',
  ));

  $wp_customize->add_control( "layout_grid_title_control", array(
    'label'    => __( 'Wyświetlanie nagłówka', 'dominium' ),
    'section'  => 'style_layout_grid_post',
    'settings' => 'layout_grid_title',
    'type'     => 'select',
    'choices'  => array(
        'up-title'  => __( 'Nad zdjęciem', 'dominium' ),
        'down-title' => __( 'Pod zdjęciem', 'dominium' ),
    ),
  ));

  // Position date
  $wp_customize->add_setting("layout_grid_date", array(
    'default'           => $defaults['settings_layout_grid']['date'],
    'sanitize_callback' => 'dominium_sanitize_layout_grid_date',
  ));

  $wp_customize->add_control( "layout_grid_date_control", array(
    'label'    => __( 'Wyświetlanie daty', 'dominium' ),
    'section'  => 'style_layout_grid_post',
    'settings' => 'layout_grid_date',
    'type'     => 'select',
    'choices'  => array(
        'up-title'  => __( 'Nad tytułem', 'dominium' ),
        'down-title' => __( 'Pod Tytułem', 'dominium' ),
        'down-article' => __( 'Pod treścią', 'dominium' ),
    ),
  ));

  // Position read more
  $wp_customize->add_setting("layout_grid_read_more", array(
    'default'           => $defaults['settings_layout_grid']['read_more'],
    'sanitize_callback' => 'dominium_sanitize_layout_grid_read_more',
  ));

  $wp_customize->add_control("layout_grid_read_more_control", array(
    'label'           => __( 'Położenie przycisku "Czytaj więcej"', 'dominium' ),
    'section'         => 'style_layout_grid_post',
    'settings'        => 'layout_grid_read_more',
    'type'     => 'select',
    'choices'  => array(
        'start'  => __( 'Lewa strona', 'dominium' ),
        'center' => __( 'Środek', 'dominium' ),
        'end' => __( 'Prawa strona', 'dominium' ),
    ),
    'active_callback' => function() use ( $wp_customize ) {
        $date_position = $wp_customize->get_setting('layout_grid_date')->value();
        return $date_position !== 'down-article';
    },
  ));

}

add_action( "customize_register", "dominium_style_layout_grid_support" );

function dominium_sanitize_layout_grid_title( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'up-title', 'down-title' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['settings_layout_grid']['title'];
}

function dominium_sanitize_layout_grid_date( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'up-title', 'down-title', 'down-article' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['settings_layout_grid']['dete'];
}

function dominium_sanitize_layout_grid_read_more( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'start', 'center', 'end' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['settings_layout_grid']['read_more'];
}

function dominium_sanitize_layout_grid_background( $value ) {
  return (bool) $value;
}
?>