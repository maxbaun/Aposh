<?php

function codex_custom_init_vendors() {
  $labels = array(
    'name'               => 'Vendors',
    'singular_name'      => 'Vendor',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Vendor',
    'edit_item'          => 'Edit Vendor',
    'new_item'           => 'New Vendor',
    'all_items'          => 'All Vendors',
    'view_item'          => 'View Vendor',
    'search_items'       => 'Search Vendors',
    'not_found'          => 'No Vendor found',
    'not_found_in_trash' => 'No Vendor found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Vendors'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'vendor' ),
    'capability_type'    => 'page',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',  )
  );

  register_post_type( 'vendor', $args );
}

add_action( 'init', 'codex_custom_init_vendors' );

function add_vendor_taxonomies() {

	register_taxonomy('vendor', 'vendor', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Vendor Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Vendor-Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Vendor-Categories' ),
			'all_items' => __( 'All Vendor-Categories' ),
			'parent_item' => __( 'Parent Vendor-Category' ),
			'parent_item_colon' => __( 'Parent Vendor-Category:' ),
			'edit_item' => __( 'Edit Vendor-Category' ),
			'update_item' => __( 'Update Vendor-Category' ),
			'add_new_item' => __( 'Add New Vendor-Category' ),
			'new_item_name' => __( 'New Vendor-Category Name' ),
			'menu_name' => __( 'Vendor Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'vendor', // This controls the base slug that will display before each term
			'with_front' => false, 
			'hierarchical' => true 
		),
	));
}
add_action( 'init', 'add_vendor_taxonomies');

?>