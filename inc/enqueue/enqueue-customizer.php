<?php
/**
 * Customizer styles and scripts
 */

function dominium_enqueue_customizer() {

  // Change class theme-xxx in <body>
  wp_enqueue_script('dominium-customizer-preview', get_template_directory_uri() . '/assets/js/customizer/dominium-customizer-refresh-theme.js', ['customize-preview'], null, true);

  // Download all theme file
  $themes_path = get_template_directory() . '/assets/css/theme/';
  $themes_url  = get_template_directory_uri() . '/assets/css/theme/';

  $theme_files = glob($themes_path . 'theme-*.css');

  foreach ($theme_files as $file) {
      $filename = basename($file);
      $handle = 'dominium-' . str_replace('.css', '', $filename);

      wp_enqueue_style($handle, $themes_url . $filename, [], null);
  }
}
dominium_enqueue_customizer();