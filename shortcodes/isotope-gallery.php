<?php
add_shortcode("isotope-gallery","isotope_gallery_callback");
function isotope_gallery_callback($atts,$content=null){
    extract(shortcode_atts(array(
        'columns' => 3,
        'type' => '',
        'categories' => '',
        'images' => '',
        'filter' => '',
        'posts_per_page' => 3
    ), $atts));

    global $imagesPerRow;
    $imagesPerRow = $columns;
    $category_arr = explode(',',$categories);
    $images_arr = explode(',',$images);

    $html = '';

    global $ISOTOPE_GALLERY_TAX_QUERY;

    $max_pages = '';
    $found_posts = '';
    $tax_query = array('relation' => 'OR');
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$html .= '<div id="images" style="display:none;" data-filter="#'.$filter.'" data-categories="'.$categories.'">';

    if(isset($type) && $type == 'category'){
        foreach($category_arr as $c){
            $tax_query[] = array(
                'taxonomy' => 'gallery-category',
                'field' => 'slug',
                'terms' => $c
            );
        }

        $ISOTOPE_GALLERY_TAX_QUERY = $tax_query;

        $args = array(
            'post_type' => 'gallery',
            'posts_per_page' => absint($posts_per_page),
            'tax_query' => $tax_query,
            'paged' => $paged
        );

        $search = ( get_query_var( 'search' ) ) ? get_query_var( 'search' ) : null;

        if(isset($search) && $search != ''){
            $args['s'] = $search;
        }

        $gal_query = isotope_gallery_query($args);
        $max_pages = $gal_query->max_num_pages;
        $found_posts = $gal_query->found_posts;
        while($gal_query->have_posts()){
            $gal_query->the_post();
            global $post;
            $html .= isotope_gallery_render_categories($post, $posts_per_page);

        }
    } else if($type == 'image'){
        $html .= isotope_gallery_render_images($images_arr);
    }

    $html .= '</div>';
    $html .= '<div class="pagination-wrapper text-center">';
    $html .= paginate_links( array(
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $max_pages
    ) );
    $html .= '</div>';
    wp_reset_postdata();
    return force_balance_tags($html);
}

function isotope_gallery_query($query_args){
    $posts = new WP_Query($query_args);
    return $posts;
}

function isotope_gallery_render_categories($gallery, $per_page){
    global $imagesPerRow;

    $col_class = $category . 'col-sm-'. floor(12 / $imagesPerRow);
    $html = '';
    $featured_image_id = get_post_thumbnail_id( $gallery->ID );
    $featured_image = wp_get_attachment_image_src($featured_image_id, 'image-home');
    $permalink = get_permalink($gallery->ID);
    $filters = '';
    $terms = get_the_terms($gallery->ID, 'gallery-category');
    foreach($terms as $term){
        $filters .= ' filter-'.strtolower($term->slug);

        $name_arr = explode(' ', $term->name);
        foreach($name_arr as $n){
            $filters .= ' filter-' . str_replace(' ', '-', strtolower($n));
        }
    }
    $title_arr = explode(' ', $gallery->post_title);
    foreach($title_arr as $t){
        $filters .= ' filter-' . str_replace(' ', '-', strtolower($t));
    }

    $html .= '<div class="isotope-gallery-item gallery-item '.$col_class.' '.$filters.'" data-size="'.$col_class.'">';
    $html .= '<a href="'.$permalink.'">';
	$html .= '<div class="image-container">';
	$html .= '<div class="image">';
    $html .= '<div style="width: 100%; padding-top: ' . $featured_image[2] / $featured_image[1] . ' %;"></div>';
	$html .= '<img src="'.$featured_image['0'].'"/>';
	$html .= '</div>';
    $html .= '<div class="overlay">';
    $html .= '<div class="vertical-center-wrapper">';
    $html .= '<div class="vertical-center">';
    $html .= '<p class="text">'.$gallery->post_title.'</p>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<p class="text">' . $gallery->post_title .'</p>';
    $html .= '</a>';
    $html .= '</div>';

    return force_balance_tags($html);
}

function isotope_gallery_render_images($image_ids){
    global $imagesPerRow;

    $col_class = $category . 'col-sm-'. floor(12 / $imagesPerRow);


    $html = '';
    $maxHeight = 0;
    $minHeight = 0;

    foreach($image_ids as $imageId){
        $img = wp_get_attachment_image_src( $imageId ,'full');
        $thumb = wp_get_attachment_image_src( $imageId ,'image-home');

        $imgStyle = 'max-width:100%; width:auto; height: ' . $maxHeight . 'px';
        $html .= '<div class="isotope-gallery-item gallery-item '.$col_class.'">';
        $html .= '<div class="image-container">';
        $html .= '<a href="'.$img[0].'" data-lightbox="photo-gallery"><img src="'.$thumb[0].'"/></a>';
        $html .= '</div>';
        $html .= '</div>';
    }

    return force_balance_tags($html);
}

?>
