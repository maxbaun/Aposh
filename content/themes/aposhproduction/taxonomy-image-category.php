<?php get_header(); ?>

<?php $classes = getPageContainClasses(); ?>

<?php
  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
  $term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
<div class="page-banner">
  <h1><?php echo get_the_archive_title(); ?></h1>
</div>
<div class="container">
    <div id="images" data-term-id="<?php echo $term->term_id; ?>">
    	<?php while(have_posts()): the_post(); ?>
    		<?php get_template_part('templates/gallery-image'); ?>
        <?php endwhile; ?>
    </div>
</div>
<!-- pagination here -->
<?php get_template_part('templates/page', 'nav'); ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>
