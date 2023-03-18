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
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="content"><?php the_content(); ?></div>
                </article>
                
            <?php endwhile; endif; ?>

		</section> <!-- /.inner -->

		<?php // get_sidebar(); # Optional ?>

	</div> <!-- /#primary -->

<?php get_footer(); ?>