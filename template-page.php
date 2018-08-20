<?php
/* Template Name: Page Template */
?>
<?php get_header(); the_post(); ?>

<?php
  $imgData = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
  $img = $imgData[0];
?>

<div class="page-hero" style="background-image:url('<?php echo $img; ?>');">
  <div class="overlay"></div>
  <div class="page-hero-inner">
    <h1 class="hero-title"><?php echo get_the_title(); ?></h1>
    <?php echo do_shortcode('[availability-widget title="Check our availability" lines=true classes="col-md-8 col-md-offset-2"]'); ?> 
  </div>
</div>
<div id="page-content">
  <?php the_content(); ?>
</div>
<?php get_footer() ?>