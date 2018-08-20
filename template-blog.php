<?php
  /* Template Name: Blog Template */
?>
<?php get_header(); the_post(); ?>

<div class="page-banner">
  <h1><?php the_title(); ?></h1>
</div>
<div id="page-content">
  <div class="blog-posts">
    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'posts_per_page' => get_option("aposh_posts_per_page"),  
        'paged' =>          $paged,
        'orderby'          => 'post_date',
        'order'            => 'DESC',        
      );

      query_posts($args);

    ?>
    <?php require( get_template_directory() . '/loop.php' ); ?>
    <?php require( get_template_directory() . '/partial-pagination.php' ); ?>   
    <?php wp_reset_query(); ?>
  </div>
</div>

<?php echo do_shortcode('[availability-section]'); ?> 

<?php get_footer() ?>