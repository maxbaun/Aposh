<?php $classes = getPostTermsAndParent('image-category'); ?>
<?php
	// $imgThumb = wp_get_attachment_image_src($post->ID,'large');
	// $imgFull = wp_get_attachment_image_src($post->ID,'full');

  $imgThumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'image-home');
  $imgFull = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');

	$imgThumbUrl = $imgThumb[0];
	$imgFullUrl = $imgFull[0];

?>
<div id="" class="image <?php echo $classes; ?>" style="display:none;">
  <a href="<?php echo $imgFullUrl; ?>" rel="group" data-lightbox="photo-gallery">
    <img class="" src="<?php echo $imgThumbUrl; ?>" />
  </a>
</div>
