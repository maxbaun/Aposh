<?php

  add_shortcode("phone-link","phoneLink");
  function phoneLink($atts, $content = null){
    extract(shortcode_atts(array(
      "class" => ""
    ), $atts));

    $html = '';

    $html .= '<a class="'.$class.'" href="tel:'. preg_replace('/\D+/', '', get_option('aposh_phone')).'">';
    
    if(isset($content) && $content != null && $content != '')
      $html .= do_shortcode($content);
    else
      $html .= get_option('aposh_phone');
    $html .= '</a>';

    return force_balance_tags($html);
  }
?>