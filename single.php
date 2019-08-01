<?php get_header();?>
<?php
	global $sp_customize;

	$single_template = apply_filters( 'sp_'.$sp_customize->get_single_template().'_template', 'partials/singles/'.$sp_customize->get_single_template().'.php' );

	require_once( $single_template );

	if( is_active_sidebar( 'single-post-footer' ) ){ dynamic_sidebar( 'single-post-footer' ); }
?>
<?php get_footer();?>
