<?php

function callback_google_map($atts,$content=null){
  extract(shortcode_atts( array(
    'class' => '',
    'style' => '',
    'id' => 'map-' . rand(0,100),
    'longitude' => '',
    'latitude' => '',
    'location' => 'Chicago',
    'address' => '320 West Ohio Stret, Chicago, IL 060654',
    'cta_text' => 'Get Directions',
    'cta_link' => ''

  ), $atts ));   

  $html = '<div class="google-map-wrapper half">';
  $html .= '
  <div
    id="map-'. $id.'"
    class="google-map half"
    data-long="'.$longitude.'" 
    data-lat="'.$latitude.'" 
    data-marker="'.getThemeImage('map_marker.png').'">';

  $html .= do_shortcode( $content );

  $html .= '</div>'; // google map
  $html .= '<div class="overlay">';

  $html .= '<div class="overlay-inner">';
  $html .= '<div class="vertical-center"><div class="vertical-center-inner">';
  $html .= '<img class="marker" src="'.getThemeImage("map_marker.png").'"/>';
  $html .= '<div class="location">' . $location . '</div>';
  $html .= '<div class="address">' . $address . '</div>';
  $html .= '<div class="break"></div>';
  $html .= '<a class="btn btn-cta btn-sm" target="_blank" href="'.$cta_link.'">'.$cta_text.'</a>';
  // $html .= do_shortcode('[cta text="'.$cta_text.'" link="'.$cta_link.'" class="btn-cta-transparent-white readmore" target="_blank"][/cta]');
  $html .= '</div></div>';
  $html .= '</div>';

  $html .= '</div>';
  $html .= '</div>';//google map wrapper

  
  return force_balance_tags($html);
  
}
add_shortcode( 'google-map' , 'callback_google_map' );

?>