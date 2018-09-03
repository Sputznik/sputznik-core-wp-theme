<?php
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