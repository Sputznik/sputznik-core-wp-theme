<?php

	add_action('customize_register', function( $wp_customize ){
		
		global $sp_customize;
		
		$sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );
		
		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_logo_section', 'Logo & Header Type', 'Upload your logo');
		
		
		/** LOGO IMAGE */ 
		$wp_customize->add_setting( 'sp_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sp_logo', array(
	    	'label'    => __( 'Logo', 'sage' ),
	    	'section'  => 'sp_logo_section',
	   		'settings' => 'sp_logo',
		) ) );
		
		/** LOGO MOBILE IMAGE */ 
		$wp_customize->add_setting( 'sp_xs_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sp_xs_logo', array(
	    	'label'    => __( 'Mobile Logo', 'sage' ),
	    	'section'  => 'sp_logo_section',
	   		'settings' => 'sp_xs_logo',
		) ) );

		
      	/** HEADER TYPE */
		$wp_customize->add_setting( 'sp_header_type' );
      	$headers_arr = array(
			'header1' => 'Default',
			//'header2' => 'Sticky',
		);
    	$sp_customize->dropdown( $wp_customize, 'sp_logo_section', 'sp_header_type', 'Header Type', 'header1', $headers_arr);
    	
		
	});