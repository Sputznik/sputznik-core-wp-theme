<?php get_header();?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
<?php get_footer();?>