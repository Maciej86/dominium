<?php
// Main settings

function dominium_get_theme_styles() {
  $themes_path = get_template_directory() . '/assets/css/theme/';
  $themes_url  = get_template_directory_uri() . '/assets/css/theme/';

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
      'label'       => __('Wybierz motyw', 'dominium'),
      'description' => __('Wersja kolorystyczna obejmuje cały motyw', 'dominium'),
      'section'     => 'dominium_theme_section',
      'settings'    => 'dominium_selected_theme',
      'type'        => 'select',
      'choices'     => $theme_choices,
  ]);
}
add_action('customize_register', 'dominium_customize_register');
