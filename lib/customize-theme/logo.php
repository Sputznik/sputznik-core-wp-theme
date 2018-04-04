<?php

	add_action('customize_register', function( $wp_customize ){
		
		global $sp_customize;
		
		$sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );
		
		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_logo_section', 'Logo & Header Type', 'Upload your logo');
		
		/** LOGO IMAGE */ 
		$sp_customize->image( $wp_customize, 'sp_logo_section', 'sp_logo[desktop]', 'Logo', '');
		
		/** LOGO MOBILE IMAGE */ 
		$sp_customize->image( $wp_customize, 'sp_logo_section', 'sp_logo[mobile]', 'Mobile Logo', '');
		
		/** HEADER TYPE */
		$headers_arr = array(
			'header1' => 'Default',
			//'header2' => 'Sticky',
		);
		
    	$sp_customize->dropdown( $wp_customize, 'sp_logo_section', 'sp_header_type', 'Header Type', 'header1', $headers_arr);
    	
	});