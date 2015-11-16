<?php

function codex_custom_init_djs() {
  $labels = array(
    'name'               => 'DJs',
    'singular_name'      => 'DJ',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New DJ',
    'edit_item'          => 'Edit DJ',
    'new_item'           => 'New DJ',
    'all_items'          => 'All DJs',
    'view_item'          => 'View DJ',
    'search_items'       => 'Search DJS',
    'not_found'          => 'No DJ found',
    'not_found_in_trash' => 'No DJ found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'DJs'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'dj' ),
    'capability_type'    => 'page',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',  )
  );

  register_post_type( 'dj', $args );
}

add_action( 'init', 'codex_custom_init_djs' );

?>