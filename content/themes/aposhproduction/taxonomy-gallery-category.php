<?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); ?>

<?php get_header(); ?>
<div class="page-banner">
    <h1><?php echo $term->name; ?></h1>
</div>
<?php get_template_part('gallery','content'); ?>
<?php echo do_shortcode('[availability-section]'); ?>
<?php get_footer() ?>
