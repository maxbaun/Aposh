<?php
  add_shortcode('social-icons','socialIcons');
  function socialIcons($atts,$content=null){
    extract(shortcode_atts(array(
      "border" => "false",
      "follow" => ""
    ), $atts));

    $html = '<div class="social">';

    if(isset($follow) && $follow != "")
    $html .= '<span class="follow">'.$follow.'</span>';

    $iconClass='';
    if(isset($border) && $border != "false")
      $iconClass .= 'border';

    $html .= '
            <a href="'.get_option('aposh_facebook_url').'"><span class="icon-social '.$iconClass.' facebook">b</span></a>
            <a href="'.get_option('aposh_twitter_url').'"><span class="icon-social '.$iconClass.' twitter">a</span></a>
            <a href="'.get_option('aposh_pinterest_url').'"><span class="icon-social '.$iconClass.' pinterest">d</span></a>
            <a href="'.get_option('aposh_instagram_url').'"><span class="icon-social '.$iconClass.' instagram">x</span></a>
            ';
          
    $html .= '</div>';
    return force_balance_tags($html);
  }
?>