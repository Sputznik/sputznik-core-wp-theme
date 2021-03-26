<?php get_header();?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container-fluid single-template-7">
		<div class="row post-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="post-thumbnail"><?php _e( do_shortcode( '[orbit_thumbnail size="full"]' ) );?></div>
					</div>
					<div class="col-sm-7">
						<div class="entry-title">
							<?php the_category();?>
							<h1><?php the_title();?></h1>
						</div>
						<hr align="left">
						<div class="entry-summary"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>
						<!-- AUTHOR AND DATE CHECK -->
						<?php if (get_post_meta ( get_the_ID(), 'Author Name', true ) == 'yes') { ?>
							<div class='author-info'>By <?php
							if ( function_exists('coauthors_posts_links') ) {
								coauthors_posts_links();
							}
							else { echo "plugin inactive"; }
							?> &nbsp;|&nbsp; <?php the_date();?></div>
						<?php }?>
						<!-- LINK TO DOWNLOAD FILE -->
						<?php
						$dnlink = get_post_meta ( get_the_ID(), 'Download Link', true );
						if ( $dnlink != null) { ?>
							<div class="download-button"><a target="_blank" href="<?php echo $dnlink ?>">Download</a></div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container single-template-7">
		<div class="row">
			<div class="col-sm-12">
				<article>
					<?php the_content(); ?>
					<div class="post-tags">
						<?php if (has_tag()) { ?>
		        <h4>Tagged Under: </h4>
		        <?php the_tags( '', '', '' ); }?>
		      </div>
					<?php do_action('sp_single7_after_post'); ?>
					<div class="space">
						<?php get_template_part( 'partials/comments', 'box');?>
						<?php get_template_part( 'partials/post', 'navigation');?>
					</div>
				</article>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
<?php get_footer();?>
