<?php 
	
	if ( ! function_exists( 'the_sp_logo' ) ) {
		function the_sp_logo(){
			include( get_template_directory()."/partials/logo.php" );
		}
	}
	
	if ( ! function_exists( 'the_sp_header' ) ) {
		function the_sp_header(){
			
			global $sp_customize;
			
			require_once( get_template_directory().'/partials/headers/'.$sp_customize->get_header_type().'.php');
			
		}
	}
	
	
	if ( ! function_exists( 'the_sp_footer' ) ) {
		function the_sp_footer(){
			
			global $sp_customize;
			
			$header_type = $sp_customize->get_header_type();
			
			switch( $header_type ){
				
				case 'header2':
					$footer_type = 'footer2';
					break;
				
				default:
					$footer_type = 'footer1';
			}
			
			require_once( get_template_directory().'/partials/footers/'.$footer_type.'.php');
			
		}
	}
	
	if ( ! function_exists( 'the_sp_social_icons' ) ) {
		function the_sp_social_icons(){
			require_once( get_template_directory().'/partials/social_icons.php');
		}
	}