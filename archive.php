<?php get_header();?>
	<div class="container">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-lg-4">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>			
		</div>
	</div>
<?php get_footer();?>