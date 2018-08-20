<?php

function codex_custom_init_faqs() {
  $labels = array(
    'name'               => 'FAQs',
    'singular_name'      => 'FAQ',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New FAQ',
    'edit_item'          => 'Edit FAQ',
    'new_item'           => 'New FAQ',
    'all_items'          => 'All FAQs',
    'view_item'          => 'View FAQ',
    'search_items'       => 'Search FAQs',
    'not_found'          => 'No FAQ found',
    'not_found_in_trash' => 'No FAQ found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'faqs'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'frequently-asked-questions' ),
    'capability_type'    => 'page',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',  )
  );

  register_post_type( 'faq', $args );
}


add_action( 'init', 'codex_custom_init_faqs' );

function add_faq_taxonomies() {

	register_taxonomy('faq', 'faq', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'faq Category', 'taxonomy general name' ),
			'singular_name' => _x( 'faq-Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search faq-Categories' ),
			'all_items' => __( 'All faq-Categories' ),
			'parent_item' => __( 'Parent faq-Category' ),
			'parent_item_colon' => __( 'Parent faq-Category:' ),
			'edit_item' => __( 'Edit faq-Category' ),
			'update_item' => __( 'Update faq-Category' ),
			'add_new_item' => __( 'Add New faq-Category' ),
			'new_item_name' => __( 'New faq-Category Name' ),
			'menu_name' => __( 'faq Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'faq', // This controls the base slug that will display before each term
			'with_front' => false, 
			'hierarchical' => true 
		),
	));
}
add_action( 'init', 'add_faq_taxonomies');

?>