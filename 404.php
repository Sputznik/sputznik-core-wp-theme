<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>
<?php
	global $sp_customize;

	$option = $sp_customize->get_option();

	// CHECK IF THE 404 TEMPLATE IS SET FROM THE THEME CUSTOMIZER
	if( !isset( $option['404_template'] ) || !$option['404_template'] || ( $option['404_template'] === 'default' ) ):
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div id="sp-notfound">
				<div class="sp-notfound">
					<div class="sp-notfound-404">
						<h1>404</h1>
					</div>
					<h2>Oops! Nothing was found</h2>
					<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable. <a href="<?php bloginfo('url');?>">Return to homepage</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php else:?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
				/*
				** To avoid conflicts with both Page Builder and other plugins that use the_content to filter the post content
				** USE WP_QUERY instead of apply_filters( 'the_content', get_page_by_path( $option['404_template'] )->post_content )
				*/
		 			$query = new WP_Query( 'pagename='.get_page_by_path( $option['404_template'] )->post_name );
					// "loop" through query (even though it's just one page)
				 	while ( $query->have_posts() ) : $query->the_post(); the_content(); endwhile;
				 	wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
<?php endif;?>
<?php get_footer(); ?>
