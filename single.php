<?php get_header();?>
<?php
	global $sp_customize;

	$post_type = get_post_type();

	$single_template = apply_filters( 'sp_'.$sp_customize->get_single_template( $post_type ).'_template', 'partials/singles/'.$sp_customize->get_single_template( $post_type ).'.php' );

	require_once( $single_template );

	if( is_active_sidebar( 'single-post-footer' ) ){ dynamic_sidebar( 'single-post-footer' ); }
?>
<?php get_footer();?>
