<?php get_header(); ?>

	

		<?php

		global $wp_query;



		$args = array_merge( $wp_query->query, array( 'posts_per_page' => -1 ) );

		query_posts( $args );        

		while (have_posts()) : the_post(); ?>                        		

				

			<div class="home_post_box" onclick="window.location='<?php the_permalink(); ?>'; return false;">

				<?php the_post_thumbnail('home-post-image'); ?>

				

				<div class="home_post_box_hover">

					<p>¡Escuchar!</p>

				</div><!--//home_post_box_hover-->

			</div><!--//home_post_box-->		



		<?php endwhile; ?>        		

		

		<div class="clear"></div>

		

<?php get_footer(); ?>            		