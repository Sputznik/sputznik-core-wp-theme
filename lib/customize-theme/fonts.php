<?php

	add_action('customize_register', function( $wp_customize ){

		global $sp_customize;

		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_font_section', 'Fonts', 'Select site typography');

		// FONT FAMILIES

		$google_fonts = apply_filters( 'sp_list_google_fonts', array(
  			array(
  				'slug'	=> 'opensans',
	  			'name'	=> 'Open Sans',
  				'url'	=> 'Open+Sans:400,400italic,700,700italic'
  			),
  			array(
  				'slug'	=> 'roboto',
	  			'name'	=> 'Roboto',
  				'url'	=> 'Roboto:400,400italic,700,700italic'
  			),
  		));

		$fonts_arr = array();

		foreach( $google_fonts as $google_font ){
			$fonts_arr[$google_font['name']] = $google_font['name'];
		}

		$font_locations = array(
			'[head]'	=> 'Heading Font',
			'[nav]'		=> 'Navigation Font',
			'[body]'	=> 'Body Font'
		);

		foreach( $font_locations as $location_id => $label ){
			$sp_customize->dropdown( $wp_customize, 'sp_font_section', '[font_family]'.$location_id, $label, 'Open Sans', $fonts_arr);
			$sp_customize->text( $wp_customize, 'sp_font_section', '[font_size]'.$location_id, 'Font Size for '.$label, '12px');
		}

	});

	add_action( 'sp_google_fonts_url', function(){

		global $sp_customize;

		/** GET FONTS SELECTED THROUGH CUSTOMIZE */
		$custom_sp_fonts = apply_filters('sp_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

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
		$google_fonts = apply_filters( 'sp_list_google_fonts', array(
  			array(
  				'slug'	=> 'opensans',
	  			'name'	=> 'Open Sans',
  				'url'	=> 'Open+Sans:400,400italic,700,700italic'
  			),
  			array(
  				'slug'	=> 'roboto',
	  			'name'	=> 'Roboto',
  				'url'	=> 'Roboto:400,400italic,700,700italic'
  			),
  		));

		$google_fonts_url = "//fonts.googleapis.com/css?family=";

		// ENQUEUE FONTS THAT ARE SELECTED
		foreach( $google_fonts as $google_font ){
			if( in_array( $google_font['name'], $font_face ) ){
				$google_fonts_url .= $google_font['url']."|";
			}
		}

		return $google_fonts_url;

	});

	add_filter('sp_font_family', function( $sp_font_family ){

		global $sp_customize;
		$option = $sp_customize->get_option();

		/* ITERATING THROUGH EACH ELEMENT */
		foreach( $sp_font_family as $element => $font_family ){

			/* IF FONT FAMILY HAS BEEN SELECTED */
			if( isset( $option['font_family'] ) && isset( $option['font_family'][$element] ) ){
				$sp_font_family[ $element ] = $option['font_family'][$element];
			}
		}

		return $sp_font_family;
	});

	/* ADD FONT FAMILY TO THE BODY */
	add_action('sp_body_styles', function(){

		global $sp_customize;

		$fonts = apply_filters('sp_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

		if( isset( $fonts['body'] ) ){
			echo "font-family: '".$fonts['body']."';";
		}

		$option = $sp_customize->get_option();

		if( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size']['body'] ) ){
			echo "font-size: ".$option['font_size']['body'].";";
		}

	});

	/* ADD FONT FAMILY TO HEADER ELEMENTS AND NAVIGATION */
	add_action('sp_styles', function(){

		global $sp_customize;

		$fonts = apply_filters('sp_font_family', array(
			'body'	=> 'Open Sans',
			'head'	=> 'Open Sans',
			'nav'	=> 'Open Sans'
		));

		$option = $sp_customize->get_option();

		$elements = array(
			'head' 	=> 'h1,h2,h3,h4,h5,h6',
			'nav'	=> 'nav'
		);

		foreach( $elements as $element => $selector ){

			if( ( isset($fonts[ $element ]) ) || ( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size'][ $element ] ) ) ){

				// PRINT SELECTOR
				_e($selector."{ ");

				// ADD FONT FAMILY
				if( isset($fonts[ $element ]) ){ _e("font-family: '".$fonts[ $element ]."';"); }

				// ADD FONT SIZE
				if( isset( $option['font_size'] ) && $option['font_size'] && isset( $option['font_size'][ $element ] ) ){
					echo "font-size: ".$option['font_size'][ $element ].";";
				}

				_e("}");
			}
		}


	});
