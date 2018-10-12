<?php get_header();?>	
<?php 
	global $sp_customize;
	$header_type = $sp_customize->get_header_type();
	
	$container_class = 'container';
	
	if( $header_type ){
		$container_class .= " with-".$header_type;
		
		if( 'header3' == $header_type && !sp_is_sticky_nav_transparent() ){
			$container_class .= " solid-menu";
		}
	}
?>
	<div id="content" class="<?php _e( $container_class );?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content('Read the rest of this entry »'); ?>
		<?php endwhile; endif; ?>
	</div>
<?php get_footer();?>				