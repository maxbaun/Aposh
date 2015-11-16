<?php
  
  add_shortcode("rental","rental");
  function rental($atts, $content = null){
    extract(shortcode_atts(array(
      "title"=>"",
      "note"=>""
    ), $atts));

    $html = '<div class="col-md-4 rental">';
    if(isset($title) && $title != ""){
      $html .= '<h5 class="rental-title">'.$title;
    
      if(isset($note) && $note != "")
        $html .= '<span class="rental-note"> '.$note.' </span>';

      $html .= '</h5>';
    }
    $html .= '<ul class="equipment-list">';
    $html .= do_shortcode($content);
    $html .= '</ul>';
    $html .= '</div>';

    return force_balance_tags($html);

  }

  add_shortcode("equipment","equipment");
  function equipment($atts,$content=null){
    extract(shortcode_atts(array(), $atts));

    $html = '<li class="rental-equipment">' . do_shortcode($content) . '</li>';

    return force_balance_tags($html);
  }

?>