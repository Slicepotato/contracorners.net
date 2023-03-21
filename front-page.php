<?php get_header(); ?>

    <div id="dance-map" class="map-ui">
        <?php get_template_part('partials/us-map', 'component'); ?>
    </div>

	<div id="primary">

	<section class="inner content-wrap" >

	<?php 
            // Default Post Loop --
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	            
			<article class="post">
                <div class="content"><?php the_content(); ?></div>
            </article>
                
    <?php endwhile; endif; ?>

	</section> <!-- /.inner -->

</div> <!-- /#primary -->

<?php get_footer(); ?>