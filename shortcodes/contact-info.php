<?php
  add_shortcode('contact-info','contactInfo');
  function contactInfo($atts,$content=null){
    extract(shortcode_atts(array(
      "title" => ""
    ), $atts));
    $html ='
        <div class="contact-info">
          <div class="vertical-center-wrapper">
            <div class="vertical-center">';
    if(isset($title) && $title != "")
      $html .= '<h2>Our Contact</h2>';
    $html .= do_shortcode('[phone-link class="phone"][/phone-link]');
    $html .='<p class="contact-extra">'. get_option("aposh_email") .'<br/>'.
                get_option("aposh_website") .'<br/>'.
                get_option("aposh_address_0") .'<br/>'.
                get_option("aposh_address_1") .'</p>';

    $html .= do_shortcode('[social-icons border="true"][/social-icons]');
    $html.=' </div>
          </div>
        </div> 
    ';
    return force_balance_tags($html);
  }


?>