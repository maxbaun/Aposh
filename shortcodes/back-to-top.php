<?php
  add_shortcode("back-to-top","backToTop");
  function backToTop($atts, $content = null){
    extract(shortcode_atts(array(), $atts));

    $html = '<section class="page-section text-center"><div class="section-content"><div class="container">';
    $html = '<a class="btn btn-cta" href="#top">Back To Top</a>';
    // $html .= '</div></div></section>';

    return force_balance_tags($html);

  }

?>