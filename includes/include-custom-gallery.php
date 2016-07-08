<?php
function add_gallery_taxonomies() {

  register_taxonomy('gallery-category', 'gallery', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Gallery Category', 'taxonomy general name' ),
      'singular_name' => _x( 'Gallery-Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Gallery-Categories' ),
      'all_items' => __( 'All Gallery-Categories' ),
      'parent_item' => __( 'Parent Gallery-Category' ),
      'parent_item_colon' => __( 'Parent Gallery-Category:' ),
      'edit_item' => __( 'Edit Gallery-Category' ),
      'update_item' => __( 'Update Gallery-Category' ),
      'add_new_item' => __( 'Add New Gallery-Category' ),
      'new_item_name' => __( 'New Gallery-Category Name' ),
      'menu_name' => __( 'Gallery Categories' ),
    ),

    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'gallery/category', // This controls the base slug that will display before each term
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}
add_action( 'init', 'add_gallery_taxonomies');

function codex_custom_init_galleries() {
  $labels = array(
    'name'               => 'Photo Gallery',
    'singular_name'      => 'Gallery',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Gallery',
    'edit_item'          => 'Edit Gallery',
    'new_item'           => 'New Gallery',
    'all_items'          => 'All Galleries',
    'view_item'          => 'View Gallery',
    'search_items'       => 'Search Galleries',
    'not_found'          => 'No Gallery found',
    'not_found_in_trash' => 'No Gallery found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Galleries'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'gallery', 'with_front' => true ),
    'capability_type'    => 'page',
    'has_archive'        => 'gallery',
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',  )
  );

  register_post_type( 'gallery', $args );
  flush_rewrite_rules();
}

add_action( 'init', 'codex_custom_init_galleries' );

?>
