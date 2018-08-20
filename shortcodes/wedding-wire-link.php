<?php
  add_shortcode('wedding-wire-link','weddingWireLink');
  function weddingWireLink($atts,$content=null){
    $html = '<div class="wedding-wire-link">
          <span class="wedding-wire-review-count">'.get_option('aposh_review_count') .' Reviews</span>
        </div>';
    return force_balance_tags($html);
  }
?>