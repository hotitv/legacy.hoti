<?php get_header(); ?>

		

		<div id="slideshow_cont">

			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-prev.png" class="slide_prev" />

			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-next.png" class="slide_next" />

			<div id="slideshow">



				<?php

				$slider_arr = array();

				$x = 0;



				$args = array(

					 //'category_name' => 'blog',

					 'post_type' => 'post',

					 'meta_key' => 'ex_show_in_slideshow',

					 'meta_value' => 'Yes',

					 'posts_per_page' => 30

					 );

				query_posts($args);

				while (have_posts()) : the_post(); ?>                        

				

					<?php if($x == 0) { ?>

					    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image',array('class' => 'first_img')); ?></a>

					<?php } else { ?>

					    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image',array('class' => 'slide image')); ?></a>

					<?php } ?>				

								

				<?php array_push($slider_arr,get_the_ID()); ?>

				<?php $x++; ?>

				<?php endwhile; ?>

				<?php wp_reset_query(); ?>                                    			



			</div><!--//slideshow-->

		</div><!--//slideshow_cont-->

		

		<?php

		$category_ID = get_category_id('blog');



		$args = array(

			 'post_type' => 'post',

			 'posts_per_page' => 30,

			 'post__not_in' => $slider_arr,

			 'cat' => '-' . $category_ID,

			 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)

			 );

		query_posts($args);

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