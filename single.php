<?php get_header();?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<div class="post-nav">
						<span class="pull-left"><?php previous_post_link("&laquo; %link", "Previous"); ?></span>
						<span class="pull-right">
					    	<?php next_post_link("%link &raquo;", "Next"); ?>
					    </span>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
<?php get_footer();?>