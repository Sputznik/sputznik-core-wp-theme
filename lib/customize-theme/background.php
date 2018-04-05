<?php

	add_action('customize_register', function( $wp_customize ){
		
		global $sp_customize;
		
		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_bg_section', 'Background', 'Body background Color & Image');
		
		/** BACKGROUND IMAGE */ 
		$sp_customize->image( $wp_customize, 'sp_bg_section', '[bg][img]', 'Background Image', '');
		
		/** BACKGROUND COLOR */ 
		$sp_customize->color( $wp_customize, 'sp_bg_section', '[bg][color]', 'Background Color', '#ffffff' );
		
	});
	
	add_action( 'sp_styles', function(){
		
		global $sp_customize;
		
		$option = $sp_customize->get_option();
		
		echo "body{ ";
			
		if( isset( $option['bg'] ) && $option['bg'] ){
			
			$bg_styles = $option['bg'];
			
			/* SETTING THE BG IMAGE */
			if( isset( $bg_styles['img'] ) ){ echo "background-image: url('".$bg_styles['img']."');"; }
			
			/* SETTING THE BG COLOR */
			if( isset( $bg_styles['color'] ) ){ echo "background-color: ".$bg_styles['color'].";"; }
			
			
		}
		
		do_action('sp_body_styles');
			
		echo "}\n";
				
	});