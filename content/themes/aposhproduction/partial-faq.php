      <?php
        $terms = get_terms("faq");
        //var_dump($terms);
        foreach($terms as $term):
              $args = array(
            'post_type' => 'faq',
            'tax_query' => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'faq',
                'field' => 'term_id',
                'terms' => array( $term->term_id)          
              )
            ),
            'posts_per_page' => '200'
          );
          $faqQuery = new WP_Query($args);
          $queryCount = $faqQuery->post_count;
          $extraClass = "";
      ?>  
        <div class="faq-section">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3 class="faq-category"><?php echo $term->name; ?></h3>
              </div>
            </div>
            
          </div>
            <?php
              $count = 0;
              while ($faqQuery->have_posts()) : $faqQuery->the_post();   
            ?>  
            <!-- FAQ TEMPLATE START -->

            <div class="faq">
              <div class="container">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <p class="title"><?php the_title(); ?></p>
                    <div class="text"><?php the_content(); ?></div>  
                  </div>
                </div>
              </div>
            </div>
            
            <!-- FAQ TEMPLATE END -->

            <?php $count++; endwhile; wp_reset_query(); ?>  
            
          
        </div>
      <?php endforeach; ?>