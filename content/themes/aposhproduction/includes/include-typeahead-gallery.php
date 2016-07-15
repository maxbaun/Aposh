<?php

function ajax_search_galleries(){
    global $ISOTOPE_GALLERY_TAX_QUERY;
    $search = $_GET['search'];
    $categories = $_GET['categories'];
    
    $category_arr = explode(',',$categories);
    $tax_query = array('relation' => 'OR');

    foreach($category_arr as $c){
        $tax_query[] = array(
            'taxonomy' => 'gallery-category',
            'field' => 'slug',
            'terms' => $c
        );
    }


    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
        's' => $search
    );

    $posts = get_posts($args);
    $ret = array();

    foreach($posts as $post){
        $ret[] = array(
            'id' => $post->ID,
            'name' => $post->post_title,
            'link' => get_the_permalink($post->ID)
        );
    }

    die(json_encode($ret));
}

add_action('wp_ajax_nopriv_search_galleries', 'ajax_search_galleries');
add_action('wp_ajax_search_galleries', 'ajax_search_galleries');

?>
