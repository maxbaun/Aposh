<?php
require_once('wp_bootstrap_navwalker.php');
require_once('shortcodes/shortcodes.php');
require_once('theme-settings.php');
require_once('widgets/widgets.php');
require_once('includes/includes.php');

remove_filter ('the_content', 'wpautop');
remove_filter ('comment_text', 'wpautop');

add_image_size( 'image-home', 390, 571, false ); // (cropped)

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
	// if(is_page_template('template-contact.php')){
	// 	wp_register_script('google-maps','https://maps.googleapis.com/maps/api/js?key=AIzaSyAZyFJjtN1lLLz3UoVF_mDelyTQOSZ0-rY',array(),false,true);
	// 	wp_enqueue_script('google-maps');
	// }
	// if(is_page_template('template-availability.php')){
	// 	wp_register_script('djep-script','http://poshlogin.com/check_req_info_form.js',array(),false,true);
	// 	wp_enqueue_script('djep-script');
	// }


	if(APOSHDEV){

		wp_register_script('require', get_bloginfo('template_url') . '/js/vendor/requirejs/require.js', array(), false, true);
		wp_enqueue_script('require');

		wp_register_script('global', get_bloginfo('template_url') . '/js/global.js', array('require'), false, true);
		wp_enqueue_script('global');

		wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
		wp_enqueue_script('livereload');

		wp_enqueue_style('bootstrap-select', get_bloginfo('template_url') . '/js/vendor/bootstrap-select/dist/css/bootstrap-select.css');
		wp_enqueue_style('lightbox', get_bloginfo('template_url') . '/js/vendor/lightbox2/dist/css/lightbox.css');
		// wp_enqueue_style('lightbox', get_bloginfo('template_url') . '/css/vendor/lightbox.css');

	}
	else{
		wp_enqueue_style('vendor', get_bloginfo('template_url') . '/css/vendor.css');

		wp_register_script('require', get_bloginfo('template_url') . '/js/require.js', array(), false, true);
		wp_enqueue_script('require');

		wp_register_script('scripts', get_bloginfo('template_url') . '/js/scripts.min.js', null, false, true);
		wp_enqueue_script('scripts');
	}
	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js');
	wp_enqueue_script('modernizr');

	wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');
}


//Add Featured Image Support
add_theme_support('post-thumbnails');

function themeImage($name){
	echo get_template_directory_uri() . '/images/' . $name;
}
function getThemeImage($name){
	return get_template_directory_uri() . '/images/' . $name;
}

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}
add_action( 'init', 'register_menus' );

function register_widgets(){

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}//end register_widgets()
add_action( 'widgets_init', 'register_widgets' );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
	return do_shortcode('[section-breaker][/section-breaker]') . do_shortcode('[more text="Read More" link="'.get_permalink($post->ID).'"][/more]');
}
add_filter('excerpt_more', 'new_excerpt_more');

// add filters for paginated links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-cta btn-sm"';
}

function getPageContainClasses(){
  $classes = 'col-sm-12';

  // if(null !== ThemeSettings\getSetting('page_contain') && '' !== ThemeSettings\getSetting('page_contain')){
  //   $classes = (null !== ThemeSettings\getSetting('page_contain_classes') && ''!== ThemeSettings\getSetting('page_contain_classes')) ? ThemeSettings\getSetting('page_contain_classes') : 'col-sm-12';
  // }
  // else
  //   $classes = 'col-sm-12';
  return $classes;
}

function getPostTermsAndParent($category){
  global $post;
  $terms = wp_get_object_terms($post->ID, $category);
  $termSlugs = array();
  foreach($terms as $term){
    $termSlugs[] = $term->slug;
    if($term->parent>0){
      $parent = get_term($term->parent,$category);
      $termSlugs[] = $parent->slug;
    }
  }
  $postClasses = implode(' ', $termSlugs);
  return $postClasses;
}

add_action('wp_head',__NAMESPACE__ . '\\ajax_url');
function ajax_url(){
  ?>
  <meta name="ajaxurl" content="<?php echo admin_url('admin-ajax.php'); ?>"></meta>
  <?php
}

function getTermLink(){
  $id = $_POST['termId'];
  $type = $_POST['type'];

  if($type == 'image'){
  	$post_type = 'image';
  	$tax = 'image-category';
  	$post_status = 'publish';
  	$posts_per_page = get_option('aposh_images_per_page');
  }

  if(isset($id) && $id != '' && gettype($id) != 'array'){
  	$link = get_term_link((int)$id,$tax);
 //  	$link = str_replace('local.aposh','localhost:3000',$link);
	}else{
		$link = '';
	}

  if(isset($id) && $id != ''){
  	$args = array(
	    'post_type'      => $post_type,
	    'post_status'    => $post_status,
	    'posts_per_page' => $posts_per_page,
	    'tax_query' => array(
	      array(
	        'taxonomy' => $tax,
	        'field'    => 'term_id',
	        'terms'    => $id,
	        'operator' => 'IN'
	      )
	    )
	  );
  }else{
	  $args = array(
	    'post_type'      => $post_type,
	    'post_status'    => $post_status,
	    'posts_per_page' => get_option('aposh_images_per_page'),
	  );
  }


	$query = new WP_Query($args);

	$ret = array('nextPage'=>$link,'maxPage'=>$query->max_num_pages, 'args' => $args);


  die(json_encode($ret));
}
add_action('wp_ajax_getTermLink',__NAMESPACE__ . '\\getTermLink');
add_action('wp_ajax_nopriv_getTermLink',__NAMESPACE__ . '\\getTermLink');

function maxPages(){

	die(json_encode($query->max_num_pages));
}
add_action('wp_ajax_maxPages',__NAMESPACE__ . '\\maxPages');
add_action('wp_ajax_nopriv_maxPages',__NAMESPACE__ . '\\maxPages');

function getPageTemplate($query){
  if(isset($query->queried_object->ID))
    return get_page_template_slug($query->queried_object->ID);
  else
    return 0;
}

add_action('pre_get_posts','alter_events_query');
function alter_events_query($query){
  global $categories,$taxonomy;

  if($query->is_main_query() && is_tax('image-category')){
    $taxonomy = 'image-category';
    $tax = array(
      $taxonomy
    );
    $args = array(
      'orderby'     => 'name',
      'hide_empty'  => true,
      'hierarchical'=> true
    );

    $categories = get_terms($tax,$args);
    $catIds = array();
    foreach ($categories as $category){
      $catIds[] = $category->term_id;
    }

    $query->set('tax_query',array(
      array(
        'taxonomy' => $taxonomy,
        'field'    => 'term_id',
        'terms'    => $catIds,
        'operator' => 'IN'
      )
    ));
  }
  if( $query->is_main_query() && (is_tax('image-category') || (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'image') ) ) {
    $query->set('post_type','image');
    $query->set('orderby','menu_order');
    $query->set('order','ASC');
    if(!is_admin())
      $query->set('posts_per_page',get_option('aposh_images_per_page'));
  }
}

?>
