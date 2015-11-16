<?php

  add_shortcode("row","row");
  function row($atts, $content=null){
    $html = '<div class="row">'.do_shortcode($content).'</div>';
    return force_balance_tags($html);
  }

  add_shortcode("half","half");
  function half($atts, $content=null){
    $html = '<div class="col-md-6">'.do_shortcode($content).'</div>';
    return force_balance_tags($html);
  }  

  add_shortcode("full","full");
  function full($atts, $content=null){
    $html = '<div class="col-md-12">'.do_shortcode($content).'</div>';
    return force_balance_tags($html);
  } 

  add_shortcode("contain","contain");
  function contain($atts, $content=null){
    $html = '<div class="col-md-10 col-md-offset-1">'.do_shortcode($content).'</div>';
    return force_balance_tags($html);
  }         

?>