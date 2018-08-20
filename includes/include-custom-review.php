<?php

function codex_custom_init_reviews() {
  $labels = array(
    'name'               => 'Reviews',
    'singular_name'      => 'Review',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Review',
    'edit_item'          => 'Edit Review',
    'new_item'           => 'New Review',
    'all_items'          => 'All Reviews',
    'view_item'          => 'View Review',
    'search_items'       => 'Search Reviews',
    'not_found'          => 'No Review found',
    'not_found_in_trash' => 'No Review found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Reviews'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'review' ),
    'capability_type'    => 'page',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',  )
  );

  register_post_type( 'review', $args );
}


add_action( 'init', 'codex_custom_init_reviews' );

?>