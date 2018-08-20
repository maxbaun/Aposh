<?php get_header(); the_post(); ?>

  <div class="page-banner">
    <h1>Blog</h1>
  </div>
<div id="page-content">
  <?php
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
    $imgStyle = 'background-image: url(' . $img[0] . '); background-size: ' . $img[1] . 'px ' . $img[2] .'px; width: '. $img[1] . 'px; height: ' . $img[2] . 'px;';
  ?>  
  <div class="blog-post-single">
    <div class="container">
      <h1 class="text-center blog-post-title"><?php the_title(); ?></h1>
    </div>
    <?php if(isset($img) && $img != NULL) : ?>

      <div class="blog-post-image" style="<?php echo $imgStyle;?>">
        <div class="blog-post-date-wrapper">
          <p class="blog-post-date"><?php the_date(); ?> By <?php the_author(); ?></p>
        </div>
      </div>

    <?php endif; ?>
    <section class="page-section">
      <div class="section-content">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <?php the_content(); ?>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php echo do_shortcode('[section-breaker][/section-breaker]'); ?>
  <div class="popular-posts">
    <section class="page-section">
      <div class="section-content">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <?php dynamic_sidebar('popular_posts'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  
</div>
<?php echo do_shortcode('[availability-section]'); ?> 
<?php get_footer() ?>