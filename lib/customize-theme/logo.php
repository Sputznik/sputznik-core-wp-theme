<?php

	add_action('customize_register', function( $wp_customize ){

		global $sp_customize;

		$sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );

		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_logo_section', 'Logo & Header Type', 'Upload your logo');

		/** LOGO IMAGE */
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][desktop]', 'Logo', '');


		/** LOGO MOBILE IMAGE */
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][mobile]', 'Mobile Logo', '');

		/** Sticky Image **/
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][sticky]', 'Sticky Logo', '');

		/** Mobile Sticky Image **/
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][mobile_sticky]', 'Mobile Sticky Logo', '');

		/**Logo Alt text**/ 
		$sp_customize->textarea( $wp_customize, 'sp_logo_section', '[logo][alt]', 'Alt Text', '' );


		/** HEADER TYPE */
		$headers_arr = apply_filters( 'sp_headers_options', array(
			'header1' => 'Default',
			'header2' => 'Left Logo & Right Menu',
			'header3' => 'Sticky Transparent Menu',
			'header4'	=> 'Centralized Logo & Menu '
		) );

    	$sp_customize->dropdown( $wp_customize, 'sp_logo_section', '[header_type]', 'Header Type', 'header1', $headers_arr);

			$sp_customize->checkbox( $wp_customize, 'sp_logo_section', '[has_search_icon]', 'Has Search Icon' );

			$sp_customize->checkbox( $wp_customize, 'sp_logo_section', '[has_cart_icon]', 'Has Cart Icon' );

	});

	/* CHANGE THE ATTRIBUTES PASSED TO THE NAVIGATION MENU */
	add_filter('sp_nav_menu_options', function( $sp_nav_menu_options ){

		global $sp_customize;

		$header_type = $sp_customize->get_header_type();

		/* CHANGE ONLY IF HEADER TYPE IS 2 */
		if( $header_type == 'header2' ){

			$sp_nav_menu_options['container_class'] = 'collapse navbar-collapse';
			$sp_nav_menu_options['container_id']    = 'bs-example-navbar-collapse-1';
			$sp_nav_menu_options['menu_class']      = 'nav navbar-nav navbar-right top-buffer text-uppercase';

		}

		if( $header_type == 'header3' ){
			$sp_nav_menu_options['container_class'] = 'navbar-collapse collapse';
			$sp_nav_menu_options['container_id']    = 'bs-example-navbar-collapse-1';
			$sp_nav_menu_options['menu_class']      = 'nav navbar-nav navbar-right';
		}

		if( $header_type == 'header4' ){
			$sp_nav_menu_options['container_class'] = 'navbar-collapse collapse';
			$sp_nav_menu_options['container_id']    = 'bs-example-navbar-collapse-1';
			$sp_nav_menu_options['menu_class']      = 'nav navbar-nav';
		}



		return $sp_nav_menu_options;
	});
