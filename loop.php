 <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

  <?php
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
    $imgStyle = 'background-image: url(' . $img[0] . '); background-size: ' . $img[1] . 'px ' . $img[2] .'px; width: '. $img[1] . 'px; height: ' . $img[2] . 'px;';
  ?>  

	<div class="container">
	  <div class="blog-post-single">
      <a href="<?php the_permalink(); ?>"><h1 class="text-center blog-post-title"><?php the_title(); ?></h1></a>
      <?php if(isset($img) && $img != NULL) : ?>
	    <a href="<?php the_permalink(); ?>" ?>
		    <div class="blog-post-image" style="<?php echo $imgStyle;?>">
		      <div class="blog-post-date-wrapper">
		        <p class="blog-post-date"><?php echo get_the_date(); ?> By <?php the_author(); ?></p>
		      </div>
		    </div>
	    </a>
	  	<?php endif; ?>
      <div class="row">
        <div class="col-md-10 col-md-offset-1 blog-excerpt">
          <?php the_excerpt(); ?>
        </div>
      </div> 
	 	</div>
  </div>

<?php endwhile; ?>
<?php endif; ?>