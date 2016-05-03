<?php
  add_shortcode("images","images");
  function images($atts,$content=null){
    extract(shortcode_atts(array(
      'per_row' => 3
    ), $atts));

    global $imagesPerRow;

    $imagesPerRow = $per_row;

    $html = '';
    $html .= '<div class="container">';
    $html .= '<div id="images">';
    $html .= do_shortcode($content);
    $html .= '</div>';
    $html .= '</div>';
    return force_balance_tags($html);
  }

  add_shortcode("image","image");
  function image($atts,$content=null){
    extract(shortcode_atts(array(
      'id' => 6102,
      'category' => null
    ), $atts));

    global $imagesPerRow;

    $class = $category . ' col-sm-'. floor(12 / $imagesPerRow);

    $html = '';
    $imgThumb = wp_get_attachment_image_src((int)$id,'image-home');
    $imgFull = wp_get_attachment_image_src((int)$id, 'large');

    $imgThumbUrl = $imgThumb[0];
  	$imgFullUrl = $imgFull[0];
    $html .= '
    <div id="" class="image '.$class.'" style="display:none;">
      <a href="'. $imgFullUrl . '" rel="group" data-lightbox="photo-gallery">
        <img class="" src="'. $imgThumbUrl . '" />
      </a>
    </div>';


    return force_balance_tags($html);
  }

?>
