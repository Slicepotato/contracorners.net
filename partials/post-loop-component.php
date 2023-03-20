<div id="primary">

	<section class="inner content-wrap" >

	<?php 
            // Default Post Loop --
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	            
			<article class="post">
                <h2 class="title"><?php the_title(); ?></h2>
                <div class="content"><?php the_content(); ?></div>
            </article>
                
    <?php endwhile; endif; ?>

	</section> <!-- /.inner -->

</div> <!-- /#primary -->