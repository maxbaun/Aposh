		</div>
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="flex-video widescreen"></div>
          </div>
        </div>
      </div>
    </div>

    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'posts_per_page' => 3,
        'paged' =>          $paged,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
      );

      $recent_posts = query_posts($args);

    ?>
		<footer id="page-footer">
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="news col-md-5">
              <h1>News from our blog</h1>
              <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
                <?php
                  // var_dump($post);
                  $title = $post->post_title;
                  $link = get_the_permalink($post->ID);
                  $date = get_the_date(null,$post->ID);
                  $author = get_the_author_meta("user_nicename",$post->post_author);
                  $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');

                  if(!isset($img) || $img == null){

                    $img[] = getThemeImage('no_thumb.jpg');
                  }
                  // $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
                  // var_dump($img);
                  // var_dump($img);
                ?>
              <a href="<?php echo $link; ?>">
                <div class="news-item">
                  <div class="vertical-center-wrapper">
                    <div class="vertical-center">
                      <div class="thumb">
                        <img src="<?php echo $img[0]; ?>"/>
                      </div>
                      <div class="text">
                        <p class="preview"><?php echo $title; ?></p>
                        <p class="author"><?php echo $date; ?> BY <?php echo $author ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            <?php endwhile; endif; ?>
            </div>
            <div class="col-md-3">
              <!-- MIDDLE FOOTER WIDGER -->
            </div>
            <div class="col-md-4">
              <?php echo do_shortcode('[contact-info][/contact-info]'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="copy">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <p class="footer-copyright">Copyright &copy; <?= date('Y') ?> <a href="http://aposhproduction.com"> APoshProduction.com</a>, Chicago Wedding & Corporate Event DJs & Wedding Reception Lighting & DJs in the Chicago area. All Rights Reserved.</p>
            </div>
            <div class="col-md-2">
              <a href="#"><img class="logo" src="<?php themeImage('aposh_logo_small.png'); ?>"/></a>
            </div>
          </div>
        </div>
      </div>

		</footer>
    <?php include('partials-lightbox.php'); ?>
		<?php wp_footer(); ?>
	</body>
</html>
