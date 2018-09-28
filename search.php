<?php get_header();?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 search-content">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), get_search_query() ); ?></h1>
					
					<?php
					if (have_posts()) : 
						while ( have_posts() ) : 
							the_post(); ?> 
							<div>
								<h2 class='orbit-title'><a href='<?php the_permalink();?>'><?php the_title();?></a></h2>
								<div class='orbit-excerpt'><?php the_excerpt();?></div>
							</div>
							<a class='orbit-btn' href='<?php the_permalink();?>'>Continue Reading</a> <?php
						endwhile;
					
						// Previous/next page navigation.
						_e('<div>');
						the_posts_pagination(
							array(
								'mid_size' 	=> 1,
								'prev_text' => __( '&laquo; Previous' ),
								'next_text' => __( 'Next &raquo;' ),
								'screen_reader_text' => __( ' ' ),
							)
						);
						_e('</div>');

			 		else :
			 			printf( __('Sorry, but nothing matched your search terms. Please try again with some different keywords.') ); 	

			 	endif; ?>
			</div>
		</div>
	</div>
<?php get_footer();?>