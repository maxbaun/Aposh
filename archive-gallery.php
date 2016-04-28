<?php get_header(); ?>
<div class="page-banner">
  <?php if(is_single()): the_post(); ?>
    <h1><?php the_title(); ?></h1>
  <?php elseif(is_archive()): ?>
    <h1><?php post_type_archive_title(); ?></h1>
  <?php else: ?>
    <h1><?php the_title(); ?></h1>

  <?php endif; ?>
</div>
<div id="page-content">
  <div class="category-filter">
    <ul>
      <?php if(is_single()): ?>
        <li><a href="<?php echo get_option('aposh_gallery_permalink'); ?>">All</a></li>
      <?php else: ?>
        <li><a data-gallery="#gallery" data-category="reset" href="<?php echo get_option('aposh_gallery_permalink'); ?>">All</a></li>
      <?php endif; ?>
      <?php
        $terms = get_terms("gallery",array(
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
                'taxonomy' => 'gallery',
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
      <?php if(is_single()): ?>
        <li><a href="<?php echo get_option('aposh_gallery_permalink'); ?>"><?php echo $term->name; ?></a></li>
      <?php else: ?>
        <li><a data-gallery="#gallery" data-category="<?php echo $term->slug; ?>" href="<?php echo $link; ?>"><?php echo $term->name; ?></a></li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php echo do_shortcode('[section-breaker][/section-breaker]'); ?>
  <section class="page-content">
    <div class="section-container">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div id="gallery" class="gallery">

              <?php if(is_single()): the_content(); ?>
              <?php else: ?>
              <?php $count = 0; ?>
              <div class="row">
              <?php foreach($queries as $query): ?>

                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <?php

                    $link = get_permalink($post->ID);
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'small');
                    $imgStyle = "width: $img[1]px; height: $img[2]px; background-size: $img[1]px $img[2]px; background-image:url($img[0]);";
                    $postTerms = get_the_terms($post->ID,'gallery');
                    $class = '';
                    foreach($postTerms as $term){
                      $class .= ' '.$term->slug;
                    }
                    if($count > 0 && $count % 4 === 0){
                        echo '</div><div class="row">';
                    }
                  ?>
                  <div class="col-md-3 gallery-item <?php echo $class; ?>">
                    <a href="<?php echo $link; ?>">
                      <div class="thumb" style="<?php echo $imgStyle; ?>">
                        <div class="overlay">
                          <div class="vertical-center-wrapper">
                            <div class="vertical-center">
                              <p class="text"><?php echo $post->post_title; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="text"><?php echo $post->post_title; ?></p>
                    </a>
                  </div>
                <?php $count = $count + 1; ?>
                <?php endwhile; ?>
              <?php endforeach; ?>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
<?php echo do_shortcode('[availability-section]'); ?>
<?php get_footer() ?>
