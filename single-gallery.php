<?php get_header(); ?>
<div class="page-banner">
    <h1><?php the_title(); ?></h1>
</div>
<?php get_template_part('gallery','content'); ?>
<?php echo do_shortcode('[availability-section]'); ?>
<?php get_footer() ?>
