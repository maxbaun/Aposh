<?php
  remove_shortcode('gallery', 'gallery_shortcode');
  add_shortcode("gallery","gallery");
  function gallery($atts, $content=null){
    extract(shortcode_atts(array(
      'columns'      => 3,
      'ids'       => array()
    ), $atts));   

    $colClass = "col-md-" . 12/$columns;

    $html = '<div class="gallery">';
    $html .= '<div class="row">';

    $imageIds = explode(',',$ids);
    $maxHeight = 0;
    $minHeight = 0;
    foreach($imageIds as $imageId){
      $img = wp_get_attachment_image_src( $imageId ,'full');
      $thumb = wp_get_attachment_image_src( $imageId ,'thumb');      
      if($thumb[2] > $maxHeight)
        $maxHeight = $thumb[2];

      if($thumb[1] > $minHeight)
        $minHeight = $thumb[1];
    }
    foreach($imageIds as $imageId){
      $img = wp_get_attachment_image_src( $imageId ,'full');
      $thumb = wp_get_attachment_image_src( $imageId ,'thumb');



      $imgStyle = 'max-width:100%; width:auto; height: ' . $maxHeight . 'px';
      $html .= '<div class="'.$colClass.'">';
      $html .= '<a href="'.$img[0].'" data-lightbox="photo-gallery"><img style="'.$imgStyle.'" src="'.$thumb[0].'"/></a>';
      $html .= '</div>';
    }

    $html .= '</div>';

    $html .= '</div>';
    return force_balance_tags($html);
  }

?>