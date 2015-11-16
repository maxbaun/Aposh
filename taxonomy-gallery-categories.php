<?php get_header(); ?>
<div class="page-banner">
  <?php if(is_single()): the_post(); ?>
    <h1><?php the_title(); ?>a</h1>  
  <?php elseif(is_archive()): ?>
    <h1><?php the_title(); ?></h1> 
  <?php else: ?>
    <h1><?php the_title(); ?></h1>
   
  <?php endif; ?>

</div>
<div id="page-content">
  <div class="category-filter">
    <ul>
      <li><a href="/gallery">All</a></li>
      <?php 
        $terms = get_terms("gallery-categories",array(
          'parent' => 0
        ));
        // var_dump($terms);
        $queries = array();
        foreach($terms as $term):
          $args = array(
            'post_type' => 'gallery',
            'tax_query' => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'gallery-categories',
                'field' => 'term_id',
                'terms' => array( $term->term_id)
                
              )
            ),
            'posts_per_page' => '200'
          ); 
          $queries[] = new WP_Query($args);  
          $category = get_category($term);
          $link = get_category_link($category->cat_ID);
       
      ?>
        <li><a href="<?php echo $link; ?>"><?php echo $term->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>  
  <?php echo do_shortcode('[section-breaker][/section-breaker]'); ?> 
  <section class="page-content">
    <div class="section-container">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="row">

                <?php while (have_posts()) : the_post(); ?>
                  <?php 
                    $link = get_permalink($post->ID);
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
                    $imgStyle = "width: $img[1]px; height: $img[2]px; background-size: $img[1]px $img[2]px; background-image:url($img[0]);"
                  ?>
                  <div class="col-md-3">
                    <a href="<?php echo $link; ?>">
                      <div class="thumb" style="<?php echo $imgStyle; ?>"></div>
                    </a>
                  </div>
                <?php endwhile; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div> 
<?php echo do_shortcode('[availability-section]'); ?> 
<?php get_footer() ?>
