<?php
/**
 * Theme enqueue debugger with source column
 */
function dominium_enqueue_debug_console() {
    if ( ! defined('WP_DEBUG') || ! WP_DEBUG ) {
        return;
    }

    global $wp_styles, $wp_scripts;

    // Funkcja pomocnicza: zwróć skróconą ścieżkę od 'themes/'
    $shorten_path = function($src) {
        if (strpos($src, '/themes/') !== false) {
            return substr($src, strpos($src, '/themes/'));
        }
        return null; // pomijamy pliki spoza motywu
    };

    // Funkcja pomocnicza: określ źródło pliku
    $get_source = function($handle) {
        if (is_front_page()) return 'homepage';
        if (is_category())   return 'category';
        if (is_singular())   return 'single';
        return 'global';
    };

    // Przygotuj tablicę stylów
    $styles = array_filter(array_map(function($handle) use ($shorten_path, $get_source, $wp_styles) {
        $src = $wp_styles->registered[$handle]->src ?? '';
        $path = $shorten_path($src);
        if (!$path) return null;
        return [
            'file'   => $path,
            'handle' => $handle,
            'source' => $get_source($handle),
        ];
    }, $wp_styles->done ?? []));

    // Przygotuj tablicę skryptów
    $scripts = array_filter(array_map(function($handle) use ($shorten_path, $get_source, $wp_scripts) {
        $src = $wp_scripts->registered[$handle]->src ?? '';
        $path = $shorten_path($src);
        if (!$path) return null;
        return [
            'file'   => $path,
            'handle' => $handle,
            'source' => $get_source($handle),
        ];
    }, $wp_scripts->done ?? []));

    echo '<script>';
    echo 'console.group("%cDominium Theme Enqueue Debug","color:#4CAF50;font-weight:bold;");';
    echo 'console.log("🧩 Theme styles loaded:");';
    echo 'console.table(' . json_encode(array_values($styles)) . ');';
    echo 'console.log("⚙️ Theme scripts loaded:");';
    echo 'console.table(' . json_encode(array_values($scripts)) . ');';
    echo 'console.groupEnd();';
    echo '</script>';
}
add_action('wp_print_footer_scripts', 'dominium_enqueue_debug_console', 9999);
