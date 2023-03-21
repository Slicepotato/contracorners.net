<div id="primary">
    <?php 
        if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        }
    ?>

	<section class="inner" >

	<?php 
            // Default Post Loop --
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	            
			<article class="post">
                <div class="content"><?php the_content(); ?></div>
            </article>
                
    <?php endwhile; endif; ?>

	</section> <!-- /.inner -->

</div> <!-- /#primary -->