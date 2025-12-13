<?php
// Main settings

function dominium_get_theme_styles() {
  $themes_path = get_template_directory() . '/assets/css/theme/';

  $theme_files = glob($themes_path . 'theme-*.css');
  $themes = [];

  foreach ($theme_files as $file) {
      $filename = basename($file);              
      $name     = str_replace('theme-', '', $filename);
      $name     = str_replace('.css', '', $name);
      $label    = ucwords(str_replace('-', ' ', $name));

      $themes[$name] = $label;
  }

  return $themes;
}


function dominium_customize_register($wp_customize) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $theme_choices = dominium_get_theme_styles();
  $wp_customize->add_section('dominium_theme_section', [
      'title'    => __('Ustawienia główne motywu', 'dominium'),
      'priority' => 30,
  ]);

  // Settings theme
  $wp_customize->add_setting('dominium_selected_theme', [
      'default'   => $defaults['main_settings']['theme'],
      'transport' => 'postMessage',
  ]);

  $wp_customize->add_control('dominium_selected_theme_control', [
      'label'       => __('Wybierz styl', 'dominium'),
      'description' => __('Styl kolorystyczny obejmuje cały motyw', 'dominium'),
      'section'     => 'dominium_theme_section',
      'settings'    => 'dominium_selected_theme',
      'type'        => 'select',
      'choices'     => $theme_choices,
  ]);

  // Add Google fonts - body
  $wp_customize->add_setting('dominium_google_font_url', [
    'default'   => $defaults['main_settings']['main_font'],
    'transport' => 'refresh',
  ]);

  $wp_customize->add_control('dominium_google_font_url_control', [
      'label'       => __('Google Fonts – URL dla całej strony (body)', 'dominium'),
      'description' => __('Wklej link z Google Fonts, np. https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap', 'dominium'),
      'section'     => 'dominium_theme_section',
      'settings'    => 'dominium_google_font_url',
      'type'        => 'textarea',
  ]);

  // Add Google fonts - h1-h6
  $wp_customize->add_setting('dominium_google_font_headings_url', [
    'default'   => $defaults['main_settings']['main_font'],
    'transport' => 'refresh',
  ]);

  $wp_customize->add_control('dominium_google_font_headings_url_control', [
      'label'       => __('Google Fonts – URL dla nagłówków (h1-h6)', 'dominium'),
      'description' => __('Jeśli chcesz osobny font dla nagłówków, wklej link z Google Fonts. Jeśli puste, użyty zostanie font body.', 'dominium'),
      'section'     => 'dominium_theme_section',
      'settings'    => 'dominium_google_font_headings_url',
      'type'        => 'textarea',
  ]);
}
add_action('customize_register', 'dominium_customize_register');
