<?php 
  /* Template Name: Vendor Template */
?>
<?php get_header(); the_post(); ?>

<div class="page-banner">
  <h1><?php the_title(); ?></h1>
</div>
<div id="page-content">

      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="vendors">
              <?php
                $terms = get_terms("vendor");
                //var_dump($terms);
                foreach($terms as $term):
                    $args = array(
                      'post_type' => 'vendor',
                      'tax_query' => array(
                        'relation' => 'AND',
                        array(
                          'taxonomy' => 'vendor',
                          'field' => 'term_id',
                          'terms' => array( $term->term_id)
                          
                        )
                      ),
                      'posts_per_page' => '200'
                    );
                  $vendorQuery = new WP_Query($args);
                  $queryCount = $vendorQuery->post_count;
                  $extraClass = "";
                  $vendorCount = 0;
              ?>

              <div class="vendor-category">
                <h1 class="vendor-category-title text-center"><?php echo $term->name; ?></h1>
                <div class="vendor-list">
                  <!-- START LOOP HERE -->
                  <?php while ($vendorQuery->have_posts()) : $vendorQuery->the_post(); ?>
                  <?php 
                    $title = get_the_title();
                    $content = get_the_content();
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
                    // var_dump($img);
                    $link = get_post_meta($post->ID,'vendor-link-val',true);
                    $phone = get_post_meta($post->ID,'vendor-phone-val',true);
                    $email = get_post_meta($post->ID,'vendor-email-val',true);
                    $t = get_term_by("name", "Wedding Venues","vendor");
                    $isVenue = (has_term($t,'vendor',$post->ID)) ? true : false;                    
                    $venuePageLink = false;
                    if($isVenue)
                      $venuePageLink = get_post_meta($post->ID,'vendor-venue-page',true);         
                    ?>
              
                  <div class="vendor-item">
                    <div class="vertical-center-wrapper">
                      <div class="vertical-center">
                        <div class="row">
                          <div class="col-md-6 thumb">
                        <!--     <div class="thumb"> -->
                              <img src="<?php echo $img[0]; ?>"/>
                            <!-- </div> -->
                          </div>
                          <div class="col-md-6 text">
                            <!-- <div class="text"> -->
                              <h3 class="title"><?php echo $title; ?></h3>
                              <div class="content"><?php echo $content; ?></div>
                            <!-- </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $vendorCount++; ?>
                  <?php endwhile; wp_reset_query();?>
                  <!-- END LOOP HERE -->
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>


  <?php echo do_shortcode('[availability-section]'); ?> 
</div>
<?php get_footer() ?>