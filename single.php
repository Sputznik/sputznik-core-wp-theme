<?php get_header();?>
<?php global $post;?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()):while ( have_posts() ) : the_post();?>
			<div class='single-featured-image'>
				<?php the_post_thumbnail('medium_large');?>
			</div>
			<h1 class="post-title text-left"><strong><?php the_title(); ?></strong></h1>
			<div class='author-info text-muted'>By <?php the_author();?> on <?php the_date();?></div>
			<?php the_content(); ?>
			<div class="post-nav">
				<span class="pull-left"><?php previous_post_link("%link", "&laquo; Previous"); ?></span>
				<span class="pull-right"><?php next_post_link("%link", "Next &raquo;"); ?></span>
			</div>
			<?php endwhile;endif;?>
			
			<?php if( is_active_sidebar( 'single-post-footer' ) ){ dynamic_sidebar( 'single-post-footer' ); }?>
			
			
		</div>
	</div>
</div>
<?php get_footer();?>
<style>
	#content{
		margin-top: 100px !important;
		margin-bottom: 100px;
	}
	@media( min-width:769px ){
		.single-featured-image{
			float: right;
			margin-left: 20px;
		}
	}
	.single-featured-image{
		margin-bottom: 20px;
	}
	.single-featured-image img{
		max-width: 600px;
		height: auto;
		width: 100%;
	}
	
	.author-info{
		margin-bottom: 20px;
	}
</style>