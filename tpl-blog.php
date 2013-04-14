<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>
	
		<div id="single_cont">
		
			<?php
			$args = array(
				 'category_name' => 'blog',
				 'post_type' => 'post',
				 'posts_per_page' => 4,
				 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
				 );
			query_posts($args);
			while (have_posts()) : the_post(); ?>                                            
		
				<div class="blog_box" onclick="window.location='<?php the_permalink(); ?>'; return false;">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="blog_box_img">
						<div class="blog_box_img_hover">
							<p><?php echo ds_get_excerpt('348'); ?></p>
						</div><!--//blog_box_img_hover-->
						<?php the_post_thumbnail('blog-image'); ?>
					</div><!--//blog_box_img-->
				</div><!--//blog_box-->
		
			<?php endwhile; ?>                                                            

			<div class="archive_nav_cont">
				<div class="left"><?php previous_posts_link(' ') ?></div>
				<div class="right"><?php next_posts_link(' ') ?></div>
				<div class="clear"></div>
			</div><!--//archive_nav_cont-->
		
		</div><!--//single_cont-->
		
		<?php get_sidebar('right'); ?>
		
<?php get_footer(); ?>            		