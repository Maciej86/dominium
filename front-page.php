<?php
get_header();

$defaults = require get_template_directory() . '/inc/theme-defaults.php';
$default_sections = $defaults['sections_front_page'];

$custom_order = get_theme_mod('sortable_custom_list');

$saved = [];
$merged_sections = [];
$sections = [];

// Reading the saved order
if ( ! empty( $custom_order ) ) {
  $decoded = json_decode( $custom_order, true );
  if ( is_array( $decoded ) ) {
    $saved = $decoded;
  }
}

// Merge defaults + saves
foreach ( $default_sections as $default ) {
  $found = false;

  foreach ( $saved as $saved_item ) {
    if ( $saved_item['section'] === $default['section'] ) {
      $merged_sections[] = array_merge( $default, $saved_item );
      $found = true;
      break;
    }
  }

  if ( ! $found ) {
    $merged_sections[] = $default;
  }
}

// Sorting by saved order
if ( ! empty( $saved ) ) {
  $order = array_column( $saved, 'section' );

  usort( $merged_sections, function ( $a, $b ) use ( $order ) {
    $posA = array_search( $a['section'], $order, true );
    $posB = array_search( $b['section'], $order, true );

    $posA = $posA === false ? PHP_INT_MAX : $posA;
    $posB = $posB === false ? PHP_INT_MAX : $posB;

    return $posA <=> $posB;
  });
}

// Visible only filter === true
foreach ( $merged_sections as $item ) {
  if ( isset( $item['visible'] ) && $item['visible'] === true ) {
    $sections[] = $item['section'];
  }
}
?>

<main>
<?php
get_template_part( 'template-parts/front_page/header', 'main' );

$allowed = array_column( $default_sections, 'section' );

foreach ( $sections as $section_id ) {
  if ( in_array( $section_id, $allowed, true ) ) {
    get_template_part(
      'template-parts/front_page/' . $section_id,
      'main'
    );
  }
}
?>
</main>

<?php get_footer(); ?>
