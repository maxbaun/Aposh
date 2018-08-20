        <?php echo do_shortcode('[wedding-wire-link][/wedding-wire-link]'); ?>

        <?php
          global $paged;
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'post_type'   => 'review',
            'posts_per_page' => get_option("aposh_posts_per_page"),  
            'paged' =>          $paged      
          );
          query_posts($args);
          $count = 1;
          while ($wp_query->have_posts()) : $wp_query->the_post();
            
        ?>  
        <!-- BIO TEMPLATE START -->

        <div class="review">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3 class="title text-center"><?php the_title(); ?></h3>
                <div class="text"><?php the_content(); ?></div>  
              </div>
            </div>
          </div>
        </div>
        
        <!-- BIO TEMPLATE END -->       

        <?php $count++; endwhile; ?>
        <?php require( get_template_directory() . '/partial-pagination.php' ); ?> 
        <?php wp_reset_query(); ?>        