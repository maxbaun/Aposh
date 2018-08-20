        <?php
          $query = new WP_Query(array('post_type' => 'dj'));
          $count = 1;
          while ($query->have_posts()) : $query->the_post();
            $img = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID),"full");
            $img_id = get_post_thumbnail_id($post->ID);
            $thumb = $img[0];
            $class = "item";
            $even = false;
            $tagline = (get_post_meta($post->ID,'tagline-val')) ? get_post_meta($post->ID,'tagline-val',true) : "" ;
            if($count % 2 == 0){
              $class .= " grey";
              $even = true;
            }
            
        ?>
        <!-- BIO TEMPLATE START -->
        <div class="section-breaker"></div>
        <div class="staff-member <?php echo $class; ?>">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="row">
                  <div class="col-md-4 text-center thumb-wrapper">
                    <div class="thumb" style="background-image: url(<?php echo $thumb ?> );"></div>
                    <h5 class="name"><?php the_title(); ?></h5>            
                  </div>
                  <div class="col-md-8 bio-wrapper">
                    <div class="bio"><?php the_content(); ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- BIO TEMPLATE END -->

        <?php $count++; endwhile; wp_reset_query(); ?>  