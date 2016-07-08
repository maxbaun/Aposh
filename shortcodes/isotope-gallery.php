<?php
add_shortcode("isotope-gallery","isotope_gallery_callback");
function isotope_gallery_callback($atts,$content=null){
  extract(shortcode_atts(array(
    'columns' => 3,
    'type' => '',
    'categories' => '',
    'images' => '',
    'filter' => ''
  ), $atts));

  global $imagesPerRow;
  $imagesPerRow = $columns;
  $category_arr = explode(',',$categories);
  $images_arr = explode(',',$images);

  $html = '';
$html .= '<div id="images" style="display:none;" data-filter="#'.$filter.'">';
    if(isset($type) && $type == 'category'){
        $html .= isotope_gallery_render_categories($category_arr);
    } else if($type == 'image'){
        $html .= isotope_gallery_render_images($images_arr);
    }
$html .= '</div>';
  return force_balance_tags($html);
}

function isotope_gallery_render_categories($categories){
    global $imagesPerRow;

    $col_class = $category . 'col-sm-'. floor(12 / $imagesPerRow);
    $html = '';
    $tax_query = array('relation' => 'OR');
    foreach($categories as $c){
        $tax_query[] = array(
            'taxonomy' => 'gallery-category',
            'field' => 'slug',
            'terms' => $c
        );
    }

    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    );

    $galleries = get_posts($args);

    foreach($galleries as $gallery){
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

        $html .= '<div class="isotope-gallery-item '.$col_class.' '.$filters.'" data-size="'.$col_class.'">';
            $html .= '<a href="'.$permalink.'">';
                $html .= '<div class="image-container" style="width: '.$featured_image[1].'px; height: 100%;; ">';
                    $html .= '<img src="'.$featured_image['0'].'"/>';
                    $html .= '<div class="overlay">';
                        $html .= '<div class="vertical-center-wrapper">';
                            $html .= '<div class="vertical-center">';
                                $html .= '<p class="text">'.$gallery->post_title.'</p>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</a>';
        $html .= '</div>';
    }
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
      $html .= '<div class="isotope-gallery-item '.$col_class.'">';
        $html .= '<div class="image-container">';
            $html .= '<a href="'.$img[0].'" data-lightbox="photo-gallery"><img src="'.$thumb[0].'"/></a>';
        $html .= '</div>';
      $html .= '</div>';
    }

    return force_balance_tags($html);
}

?>
