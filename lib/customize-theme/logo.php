<?php

	add_action('customize_register', function( $wp_customize ){
		
		global $sp_customize;
		
		$sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );
		
		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_logo_section', 'Logo & Header Type', 'Upload your logo');
		
		/** LOGO IMAGE */ 
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][desktop]', 'Logo', '');
		
		/** LOGO MOBILE IMAGE */ 
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][mobile]', 'Mobile Logo', '');
		
		/** HEADER TYPE */
		$headers_arr = array(
			'header1' => 'Default',
			'header2' => 'Left Logo & Right Menu',
		);
		
    	$sp_customize->dropdown( $wp_customize, 'sp_logo_section', '[header_type]', 'Header Type', 'header1', $headers_arr);
    	
	});
	
	/* PRINT LOGOS TO THE HEADER */
	add_action('sp_logo', function(){
		
		global $sp_customize;
		
		$option = $sp_customize->get_option();
		
		if( isset( $option['logo'] ) && $option['logo'] ){
			
			$img_alt = esc_attr( get_bloginfo( 'name', 'display' ) );
			
			/* CONTAINER */
			_e('<div class="logo"><a class="navbar-brand" href="'.get_bloginfo('url').'">');
			
			/* DESKTOP LOGO */
			if( isset( $option['logo']['desktop'] ) && $option['logo']['desktop'] ){
				
				$img_desktop_class = isset( $option['logo']['mobile'] ) ? 'hidden-xs' : '';
				
				$img_desktop_src = esc_url( $option['logo']['desktop'] );
				
				_e('<img class="'.$img_desktop_class.'" src="'.$img_desktop_src.'" alt="'.$img_alt.'">');
			}
			
			/* MOBILE LOGO */
			if( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ){
				
				$img_mobile_class = 'visible-xs';
				
				$img_mobile_src = esc_url( $option['logo']['mobile'] );
				
				_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');
				
			}
				
			_e('</a></div>');
		}
	});
	
	/* ADD HEADER */
	add_action('sp_header', function(){
		global $sp_customize;
			
		require_once( 'partials/headers/'.$sp_customize->get_header_type().'.php');
		
	});
	
	add_action('sp_nav_menu', function(){
		
		$sp_nav_menu_options = apply_filters( 'sp_nav_menu_options', array(
			'menu'              => 'primary',
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'navbar navbar-inverse navbar-fixed-top',
			'container_id'      => 'sidebar-wrapper',
			'menu_class'        => 'nav sidebar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		));
		
		wp_nav_menu( $sp_nav_menu_options );
		
	});