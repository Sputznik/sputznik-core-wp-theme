<?php get_header();?>
	<div class="container-fluid">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content('Read the rest of this entry »'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php get_footer();?>				