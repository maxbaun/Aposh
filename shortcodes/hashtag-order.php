<?php 
  add_shortcode("hashtag-order","hashtagOrder");
  function hashtagOrder($atts,$content=null){
    extract(shortcode_atts(array(), $atts));

    $html = '<div class="hashtag-order"><div class="row">'.do_shortcode($content).'</div></div>';
    return force_balance_tags($html);
  }

  add_shortcode("order","order");
  function order($atts, $content=null){
    extract(shortcode_atts(array(
      "index" => 1,
      "image" => ""
    ), $atts));

    $img = wp_get_attachment_image_src( $image ,'full');

    $html = '<div class="order-item col-md-4">
      <h1 class="index">'.$index.'</h1>
      <img class="thumb" src="'.$img[0].'"/>
      <p class="text">'.do_shortcode($content).'</p></div>';

    return force_balance_tags($html);
  }

?>