<?php
/* Template Name: Gallery Template Iso */
?>
<?php get_header(); ?>

<div class="page-banner">
  <h1><?php the_title(); ?></h1>
</div>
<?php get_template_part('templates/filter'); ?>
<div class="container">
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'=>'image',
            'orderby' => 'name',
            'order' => 'ASC',
            'posts_per_page' => get_option('aposh_images_per_page'),
            'paged' => $paged
        );
        $wp_query = new WP_Query($args);
    ?>
    <div id="images">
    	<?php while(have_posts()): the_post(); ?>
    		<?php get_template_part('templates/gallery-image'); ?>
        <?php endwhile; ?>
    </div>
    <!-- pagination here -->
    <?php get_template_part('templates/page', 'nav'); ?>
    <?php wp_reset_query(); ?>
</div>

<?php get_footer() ?>
