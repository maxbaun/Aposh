<?php 
  /* Template Name: Page (No Image) Template */
?>
<?php get_header(); the_post(); ?>

<div class="page-banner">
  <h1><?php echo get_the_title(); ?></h1>
</div>
<div id="page-content">
  <?php
  if(!is_page_template('template-gallery.php') && (is_page_template('template-reviews.php') || is_page_template('template-faq.php') || is_page_template('template-staff.php') || is_page_template('template-gallery.php')))
    the_content(); 
  ?>
  <?php
    if(is_page_template('template-faq.php'))
      get_template_part('partial-faq');
    else if(is_page_template('template-reviews.php'))
      get_template_part('partial-reviews');  
    else if(is_page_template('template-staff.php'))
      get_template_part('partial-staff'); 
    else if(is_page_template('template-gallery.php'))
      get_template_part('partial-gallery');
    else
      the_content();                    
  ?>
  <?php
  if(is_page_template('template-gallery.php'))
    the_content(); 
  ?>  
</div> 
<?php
  $availabilityClass = 'grey';
  if(isset($class) && strpos($class,'grey') !== false){
    $availabilityClass = 'white';
  }
?>
<?php echo do_shortcode('[availability-section class="'.$availabilityClass.'"]'); ?> 
<?php get_footer() ?>

