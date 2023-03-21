<?php get_header(); ?>
<?php 
    if ( has_post_thumbnail() ) {
        the_post_thumbnail();
    }
?>
<?php get_template_part('partials/post-loop', 'component'); ?>
<?php get_footer(); ?>