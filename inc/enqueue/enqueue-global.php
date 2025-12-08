<?php
/**
 * Global styles and scripts (used on every page)
 */

function dominium_enqueue_global() {
    $defaults = require get_template_directory() . "/inc/theme-defaults.php";
    $up_menu_visible = get_theme_mod("up_menu_visible", $defaults["up_menu"]["visible"]);
    $theme = get_theme_mod('dominium_selected_theme', $defaults["main_settings"]["theme"]);

    // Google Fonts + base styles
    wp_enqueue_style('dominium-font-google', 'https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap', [], null);
    wp_enqueue_style('dominium-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'), 'all');
    wp_enqueue_style('dominium-icons', get_stylesheet_directory_uri() . '/assets/css/font-icons.css', [], filemtime(get_stylesheet_directory() . '/assets/css/font-icons.css'), 'all');

    // Global layout styles
    
    wp_enqueue_style('dominium-header', get_stylesheet_directory_uri() . '/assets/css/header.css', [], filemtime(get_stylesheet_directory() . '/assets/css/header.css'), 'all');
    if($up_menu_visible) {
        wp_enqueue_style('dominium-header-contact', get_stylesheet_directory_uri() . '/assets/css/parts/header-contact.css', [], filemtime(get_stylesheet_directory() . '/assets/css/parts/header-contact.css'), 'all');
    }
    wp_enqueue_style('dominium-navigation', get_stylesheet_directory_uri() . '/assets/css/navigation.css', [], filemtime(get_stylesheet_directory() . '/assets/css/navigation.css'), 'all');
    wp_enqueue_style('dominium-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', [], filemtime(get_stylesheet_directory() . '/assets/css/footer.css'), 'all');
    wp_enqueue_style('dominium-page', get_stylesheet_directory_uri() . '/assets/css/page.css', [], filemtime(get_stylesheet_directory() . '/assets/css/page.css'), 'all');

    wp_enqueue_style('dominium-theme-' . $theme, get_template_directory_uri() . '/assets/css/theme/theme-' . $theme . '.css', filemtime(get_stylesheet_directory() . '/assets/css/theme/theme-' . $theme . '.css'), 'all');

    // Global scripts
    wp_enqueue_script('dominium-image-background', get_template_directory_uri() . '/assets/js/dominium-image-background.js', [], '1.0', true);
    wp_enqueue_script('dominium-toggle-mobile-menu', get_template_directory_uri() . '/assets/js/dominium-toggle-mobile-menu.js', [], '1.0', true);
}
dominium_enqueue_global();
