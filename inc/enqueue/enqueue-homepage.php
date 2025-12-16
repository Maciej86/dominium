<?php
/**
 * Dynamically enqueue homepage styles based on Customizer category selections
 */
function dominium_enqueue_homepage() {
	$defaults = require get_template_directory() . '/inc/theme-defaults.php';
	$sections_defaults = $defaults['sections_front_page'];

	// We download the section visibility saved in the Customizer
	$saved_value = get_theme_mod('sortable_custom_list', '');
	$saved_order = [];
	if (!empty($saved_value)) {
			$decoded = json_decode($saved_value, true);
			if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
					$saved_order = $decoded;
			}
	}

	// We map the visibility of the section: if there is no value stored, we use the default
	$sections_visibility = [];
	foreach ($sections_defaults as $section) {
			$sections_visibility[$section['section']] = $section['visible'];
	}
	if (!empty($saved_order)) {
			foreach ($saved_order as $section) {
					$sections_visibility[$section['section']] = $section['visible'];
			}
	}

	// ---------- Always loaded header ----------
	$header_path = get_stylesheet_directory() . '/assets/css/parts/header-content.css';
	if (file_exists($header_path)) {
			wp_enqueue_style(
					'dominium-header-content',
					get_stylesheet_directory_uri() . '/assets/css/parts/header-content.css',
					[],
					filemtime($header_path),
					'all'
			);
	}

	// ---------- Visibility-dependent sections ----------
	$section_styles = [
		'steps'      => '/assets/css/parts/steps.css',
		'counts'     => '/assets/css/parts/counts.css',
		'write_to_us'=> '/assets/css/parts/write-to-us.css',
		'home_page'=> '/assets/css/parts/home-page.css',
	];

	foreach ($section_styles as $section => $file) {
		if (!empty($sections_visibility[$section])) {
			$path = get_stylesheet_directory() . $file;
			if (file_exists($path)) {
				wp_enqueue_style("dominium-{$section}",get_stylesheet_directory_uri() . $file,[],filemtime($path),'all');
			}
		}
	}

	// ---------- Categories (products and blog) ----------
	$category_settings = [
		'products' => get_theme_mod('products_post_category', 0),
		'blog'     => get_theme_mod('blog_post_category', 0),
	];

	$enqueued_files = []; // tablica ścieżek już wczytanych plików

	foreach ($category_settings as $section => $cat_id) {
		// Skip if the category is not selected or the section is hidden
		if (!$cat_id || empty($sections_visibility[$section]) || !$sections_visibility[$section]) {
				continue;
		}

		// Layout assigned to category (fallback: layout-grid)
		$layout = get_theme_mod("dominium_category_{$cat_id}_layout", 'layout-grid');
		$layout_slug = sanitize_key($layout);
		$css_file = "/assets/css/category/{$layout_slug}.css";
		$css_path = get_stylesheet_directory() . $css_file;

		if (!file_exists($css_path)) {
			$layout_slug = 'layout-grid';
			$css_file = "/assets/css/category/{$layout_slug}.css";
			$css_path = get_stylesheet_directory() . $css_file;
		}

		// Skip enqueue if this file was already added
		if (in_array($css_path, $enqueued_files)) {
			continue;
		}

		wp_enqueue_style("dominium-homepage-{$section}-{$layout_slug}",get_stylesheet_directory_uri() . $css_file,[],filemtime($css_path),'all');

		// Mark file as enqueued
		$enqueued_files[] = $css_path;
	}

	// ---------- JS only on the homepage ----------
	$js_file = '/assets/js/dominium-counter.js';
	$js_path = get_template_directory() . $js_file;

	if (file_exists($js_path) && !empty($sections_visibility['counts']) && $sections_visibility['counts']) {
  	wp_enqueue_script('dominium-counter', get_template_directory_uri() . $js_file, [], '1.0', true);
	}
};
dominium_enqueue_homepage();
