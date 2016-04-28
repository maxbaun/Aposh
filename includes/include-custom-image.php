<?php

// register new taxonomy which applies to attachments
function add_image_category() {
    $labels = array(
        'name'              => 'Image Categories',
        'singular_name'     => 'Image Category',
        'search_items'      => 'Search Image Categories',
        'all_items'         => 'All Image Categories',
        'parent_item'       => 'Parent Image Category',
        'parent_item_colon' => 'Parent Image Category:',
        'edit_item'         => 'Edit Image Category',
        'update_item'       => 'Update Image Category',
        'add_new_item'      => 'Add New Image Category',
        'new_item_name'     => 'New Image Category Name',
        'menu_name'         => 'Image Category',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'has_archive' => true,
        'rewrite' => array('slug'=>'image/category','hierarchical' => true, 'with_front' => false),
        'show_admin_column' => 'true',
        'update_count_callback' => '_update_generic_term_count'
    );

    register_taxonomy( 'image-category', 'image', $args );
}
add_action( 'init', 'add_image_category' );

function custom_init_images() {
  $labels = array(
    'name'               => 'Images',
    'singular_name'      => 'Image',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Image',
    'edit_item'          => 'Edit Image',
    'new_item'           => 'New Image',
    'all_items'          => 'All Images',
    'view_item'          => 'View Image',
    'search_items'       => 'Search Images',
    'not_found'          => 'No Image found',
    'not_found_in_trash' => 'No Image found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Images'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'image','with_front' => true ),
    'capability_type'    => 'page',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', )
  );

  register_post_type( 'image', $args );
}


add_action( 'init', 'custom_init_images' );



?>
