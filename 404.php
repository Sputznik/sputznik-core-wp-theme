<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>
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
<?php get_footer(); ?>
