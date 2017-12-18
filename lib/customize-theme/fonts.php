<?php
	
	add_action('customize_register', function( $wp_customize ){
		
		global $sp_customize;
		
		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_font_section', 'Font Family', 'Select site typography');
			
		// FONT FAMILIES
			
		$google_fonts = $sp_customize->list_google_fonts();
			
		$fonts_arr = array();
			
		foreach( $google_fonts as $google_font ){
			$fonts_arr[$google_font['name']] = $google_font['name'];
		}
			
		$font_locations = array(
			'sp_fonts[head]'	=> 'Header Font',
			'sp_fonts[nav]'		=> 'Navigation Font',
			'sp_fonts[body]'	=> 'Body Font'
		);
			
		foreach( $font_locations as $location_id => $label ){
			$sp_customize->dropdown( $wp_customize, 'sp_font_section', $location_id, $label, 'Open Sans', $fonts_arr);
		}
		
	});
	
	add_action( 'sp_google_fonts_url', function(){
		
		global $sp_customize;
		
		/** GET FONTS SELECTED THROUGH CUSTOMIZE */
		$custom_sp_fonts = $sp_customize->selected_fonts();
		
		$font_face = array();
			
		foreach( $custom_sp_fonts as $font ){
				
			// CHECK IF FONT IS EMPTY
			if( $font ){ $font_face[] = $font; }
		}
			
		// DEFAULT FONT IF NONE IS SELECTED THROUGH CUSTOMIZE
		if( ! count( $font_face ) ){
			$font_face[] = "Open Sans";
		}
		/* END OF SELECTED FONTS */
			
		
			
		/* LIST OF ALL THE FONTS */
		$google_fonts = $sp_customize->list_google_fonts();
		
		$google_fonts_url = "//fonts.googleapis.com/css?family=";
		
		// ENQUEUE FONTS THAT ARE SELECTED
		foreach( $google_fonts as $google_font ){
			if( in_array( $google_font['name'], $font_face ) ){
				$google_fonts_url .= $google_font['url']."|";	
			}
		}
		
		return $google_fonts_url;
		
	});
	
	/* ADD FONT FAMILY TO THE BODY */
	add_action('sp_body_styles', function(){
		
		global $sp_customize;
		
		$fonts = $sp_customize->selected_fonts();
		
		if( isset( $fonts['body'] ) ){
			echo "font-family: ".$fonts['body'].";";
		}
		
	});
	
	/* ADD FONT FAMILY TO HEADER ELEMENTS AND NAVIGATION */
	add_action('sp_styles', function(){
		
		global $sp_customize;
		
		$fonts = $sp_customize->selected_fonts();
			
		if( isset($fonts['head']) ){
			_e("h1,h2,h3,h4,h5,h6{ font-family: '".$fonts['head']."'; }");
		}
		
		if( isset($fonts['nav']) ){
			_e("nav{ font-family: '".$fonts['nav']."'; }");
		}
		
	});
	
	