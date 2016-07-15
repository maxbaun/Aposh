<?php
  add_shortcode("page-slider", "pageSlider");
  function pageSlider($atts,$content=null){
    extract(shortcode_atts(array(
      "ids" => array()
    ), $atts));

    $imageIds = explode(',',$ids);
    $imageGroups = array();
    $outterCount = 0;
    for($x=0; $x< count($imageIds); $x+=3){
      // echo $x;
      for($i=$x;$i<(3+$x);$i++){
        // echo $imageIds[$i] . '<br/>';
        // echo $x+$i . '<br/>';
        $imageGroups[$outterCount]['imageIds'][] = isset($imageIds[$i]) ? $imageIds[$i] : "";
      }
      
      $outterCount ++;
    }

    // var_dump(json_encode($imageGroups));

    $pageSliderId = "page-slider-" . rand(0,100000);

    $html = '
       <div id="'.$pageSliderId.'" class="carousel slide page-carousel" data-ride="carousel">
          <div class="carousel-inner" role="listbox">';

    $count = 0;
    // outer slide item
    foreach($imageGroups as $imageGroup){
      $classes = ($count == 0) ? 'active' : '';
      $html .= '<div class="item '. $classes .'"><div class="row text-center">';

      // inner slide loop aka 3 images per item
      foreach($imageGroup['imageIds'] as $imageId){
        $img = wp_get_attachment_image_src( $imageId ,'full');
        $html .= '
                <div class="image-wrapper">
                  <a href="'.$img[0].'" data-lightbox="lightbox-'.$pageSliderId.'"><img src="'.$img[0].'"/></a>
                </div>
        ';
      }
      
      $html .= '</div></div>';
      $count ++;

    }
    $html .= '
          <a class="left carousel-control" href="#'.$pageSliderId.'" role="button" data-slide="prev">
            <div></div>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#'.$pageSliderId.'" role="button" data-slide="next">
            <div></div>
            <span class="sr-only">Next</span>
          </a>
        </div>';

    return force_balance_tags($html);    
  }

?>