<?php 

  add_shortcode("availability-section","availabilitySection");
  function availabilitySection($atts,$content=null){
    extract(shortcode_atts(array(
          "class" => "grey",
          "line" => "true"
        ), $atts));    
    $html = '';
    if($line == "true")
      $html.='<div class="section-breaker"></div>';
    
    $html.='<section class="'.$class.'">
        <div class="container">
          <div class="section-content">';
    
    $html .= do_shortcode('[availability-widget lines=true classes="text-center"]');
    
    $html .= '
          </div>  
        </div>

      </section>';
    return force_balance_tags($html); 
  }

  add_shortcode("availability-widget","availabilityWidget");
  function availabilityWidget($atts, $content = null){
    extract(shortcode_atts(array(
      "lines" => false,
      "caption" => null,
      "classes" => null,
      "title" => "Are We Available?"
    ), $atts));

    
    if (!isset($caption))
      $classes .= ' no-caption';

    if (isset($lines) && $lines == true)
      $classes .= ' has-lines';

    $html = '
        <div class="availability-widget '.$classes.'">
          <h1 class="title">'. $title .'</h1>';

    if (isset($caption))
      $html .= '<h3 class="caption">'.$caption.'</h3>';

    $submitPage = get_permalink(get_option("aposh_availability_page"));

    $html .= '
          <div style="">
            
            <div class="availability-checker">
              <form action="'.$submitPage.'" method="POST">
              <div class="dropdowns">';

    $html .= do_shortcode('[month-select class="form-control"][/month-select]');
    $html .= do_shortcode('[day-select class="form-control"][/day-select]');
    $html .= do_shortcode('[year-select class="form-control"][/year-select]');
                                
    $html .= '</div>          
              <div class="btn-wrapper">
                <input type="submit" class="btn btn-cta" value="Check Now"/>
              </div>  
              </form>        
            </div>
            
          </div>
        </div>';

    return force_balance_tags($html);
  }
?>