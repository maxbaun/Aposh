<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */

require_once('widget_home_slider.php');
require_once('widget_home_featured.php');
require_once('widget_home_video.php');
require_once('widget_photo_addons.php');

function aposh_widgets_init() {

  register_sidebar( array(
    'name'          => 'Home Slider',
    'id'            => 'home_slider',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Home Featured',
    'id'            => 'home_featured',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );  

  register_sidebar( array(
    'name'          => 'Home Video',
    'id'            => 'home_video',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );   

  register_sidebar( array(
    'name'          => 'Photo Add On Area',
    'id'            => 'photo_addons',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );   

  register_sidebar( array(
    'name'          => 'Popular Posts Area',
    'id'            => 'popular_posts',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );   

}
add_action( 'widgets_init', 'aposh_widgets_init' );
?>