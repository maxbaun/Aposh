<?php

  require_once('bootstrap.php');
  require_once('gallery.php');
  require_once('page-slider.php');
  require_once('back-to-top.php');
  require_once('hashtag-order.php');
  require_once('wedding-wire-link.php');
  require_once('contact-info.php');
  require_once('social-icons.php');
  require_once('availability.php');
  require_once('client-login.php');
  require_once('date-inputs.php');
  require_once('phone.php');
  require_once('rental.php');
  require_once('map.php');

  add_shortcode("page-quote","pageQuote");
  function pageQuote($atts, $content = null){
    extract(shortcode_atts(array(), $atts));

    $html = '<div class="container"><div class="page-quote">';
    $html .= do_shortcode($content);
    $html .= '</div></div>';

    return force_balance_tags($html);

  }



  add_shortcode("section-breaker","sectionBreaker");
  function sectionBreaker(){
    $html = '<div class="section-breaker"></div>';
    return force_balance_tags($html);
  }

  add_shortcode("page-section","pageSection");
  function pageSection($atts, $content=null){
    extract(shortcode_atts(array(
      "title" => "",
      "contain" => "true",
      "class" => ""
    ), $atts));

    $colClasses = "";
    if(isset($contain) &&  $contain == "true")
      $colClasses = "col-md-10 col-md-offset-1";
    else
      $colClasses = "col-md-12";

    $html = '<section class="page-section '.$class.'"><div class="section-content">';
    
    // if(strpos($class,'photo-addon-section') !== false)
      $html .= '<div class="container">';
      
    $html .= '<div class="row"><div class="'.$colClasses.'">';
    if(isset($title) && $title != "")
      $html .= '<h3 class="page-section-title">'.$title.'</h3>';
    $html .= '<div class="dj-entertainment-content">'.do_shortcode($content).'</div>';
    $html .= '</div></div>';

    // if(strpos($class,'photo-addon-section') !== false)
      $html .= '</div>';

    $html .= '</div></section>';


    return force_balance_tags($html);
  }

  add_shortcode("photo-addons","photoAddons");
  function photoAddons($atts, $content){
    extract(shortcode_atts(array(
      "title" => "",
      "contain" => "true",
      "class" => ""
    ), $atts));    

    $html = '<section class="page-section '.$class.'"><div class="section-content">';
    
      
    if(isset($title) && $title != "")
      $html .= '<h3 class="page-section-title page-section-title-photo-addons">'.$title.'</h3>';
    
    $html .= '<div class="dj-entertainment-content">'.do_shortcode($content).'</div>';
    $html .= '</div></section>';
    return force_balance_tags($html);
  }

  add_shortcode('photo_addon_widget','photoAddonWidget');
  function photoAddonWidget($atts,$content=null){
    ob_start();
    dynamic_sidebar( 'photo_addons' );
    
    $innerHtml = ob_get_contents();
    $html = do_shortcode('[photo-addons class="grey photo-addons" title="Photo Add Ons"]' . $innerHtml . '[/photo-addons]');
    ob_end_clean();
    return force_balance_tags($html);
  }  

  add_shortcode("video","video");
  function video($atts,$content = null){
    extract(shortcode_atts(array(
      "image" => null,
      "title" => "",
      "class" => ""
    ), $atts)); 

    $img = wp_get_attachment_image_src( $image ,'full');

    $style = '
      background-image:url('.$img[0].');
      background-size:'.$img[1].'px '.$img[2].'px;
      max-width: '.$img[1].'px;
      height: '.$img[2].'px;
    ';

    $overlayStyle = '
      max-width: '.$img[1].'px;
    ';

    $html = '<div class="video-thumb '.$class.'" style="'.$style.'">';
    $html .= '<div class="overlay" style="'.$overlayStyle.'">';
    $html .= '<div class="vertical-center-wrapper text-center">';
    $html .= '<div class="vertical-center">';

    if(isset($title) && $title != "")
      $html .= '<h1 class="video-title">'.$title.'</h1>';

    $html .= '<div class="btn-wrapper">';
    $html .= '<a href="#" class="launch-video btn btn-cta" data-video="'.esc_attr($content).'">Play</a>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    // $html .= '<a href="'.$img.'" data-lightbox="'.$img.'"><img src="'.$img.'"/></a>';

    $html .= '</div>';
    return force_balance_tags($html);
  }

  add_shortcode("page-testimonial","pageTestimonial");
  function pageTestimonial($atts, $content = null){

    $html = '<div class="page-testimonial">';
    // $html .= '<span class="testimonial-left">&ldquo;</span>';
    $html .= '<span class="testimonial-text">'.do_shortcode($content).'</span>';
    // $html .= '<span class="testimonial-right">&rdquo;</span>';
    $html .- '</div>'; 

    return force_balance_tags($html); 
  }

  add_shortcode('more','more');
  function more($atts,$content=null){
    extract(shortcode_atts(array(
      "link" => "",
      "text" => "Learn More"
    ), $atts));     
    $html = '<a href="'.$link.'" class="read-more">'.$text.' <span class="glyphicon glyphicon-arrow-right"></span></a>';
    return force_balance_tags($html);
  }
?>