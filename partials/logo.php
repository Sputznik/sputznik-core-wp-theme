<?php
	global $sp_customize;

	$option = $sp_customize->get_option();

	$nav_transparent = sp_is_sticky_nav_transparent();

	if( isset( $option['logo'] ) && $option['logo'] ){

		$img_alt = esc_attr( get_bloginfo( 'description', 'display' ) );

		/* CONTAINER */
		_e('<div class="logo logo-normal"><a class="navbar-brand" href="'.get_bloginfo('url').'">');

		/*DESKTOP LOGO*/
		if( isset( $option['logo']['desktop'] ) && $option['logo']['desktop'] ){

			$img_desktop_class = isset( $option['logo']['mobile'] ) ? 'hidden-xs desktop-logo' : 'desktop-logo';

			$img_desktop_src = esc_url( $option['logo']['desktop'] );

			_e('<img class="'.$img_desktop_class.'" src="'.$img_desktop_src.'" alt="'.$img_alt.'">');
		}

		/* MOBILE LOGO */
	 	if( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ){

	 		$img_mobile_class = 'visible-xs';

	 		$img_mobile_src = ( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ) ? esc_url( $option['logo']['mobile'] ) : esc_url( $option['logo']['desktop'] );

	 		_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');

	 	}

		// END OF CONTAINER
		_e('</a></div>');
	}
