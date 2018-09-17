<?php
	global $sp_customize, $post;
		
	$option = $sp_customize->get_option();

	$nav_transparent = sp_is_sticky_nav_transparent();
	
	if( isset( $option['logo'] ) && $option['logo'] ){
			
		$img_alt = esc_attr( get_bloginfo( 'name', 'display' ) );
			
		/* CONTAINER */
		_e('<div class="logo"><a class="navbar-brand" href="'.get_bloginfo('url').'">');


		if( $option['header_type'] === 'header3' && (bool)$nav_transparent ){

			/* Sticky Logo */
			if( isset( $option['logo']['sticky'] ) && $option['logo']['sticky'] ){
					
				$img_sticky_class =  ( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] )  ? 'hidden-xs sticky-logo' : 'sticky-logo';
				
		
				$img_sticky_src = esc_url( $option['logo']['sticky'] );
					
				_e('<img class="'.$img_sticky_class.'" src="'.$img_sticky_src.'" alt="'.$img_alt.'">');
			}


			/* MOBILE LOGO */
			if( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] ) {
					
				$img_mobile_class = 'visible-xs';
					
				$img_mobile_src = ( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] ) ? esc_url( $option['logo']['mobile_sticky'] ) : esc_url( $option['logo']['mobile'] );
					
				_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');
					
			}

		} else {

			/*DESKTOP LOGO*/
			if( isset( $option['logo']['desktop'] ) && $option['logo']['desktop'] ){

				$img_desktop_class = isset( $option['logo']['mobile'] ) ? 'hidden-xs' : '';

				$img_desktop_src = esc_url( $option['logo']['desktop'] );

				_e('<img class="'.$img_desktop_class.'" src="'.$img_desktop_src.'" alt="'.$img_alt.'">');
			}

			/* MOBILE LOGO */
	 		if( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ){
	 				
	 			$img_mobile_class = 'visible-xs';
	 				
	 			$img_mobile_src = ( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ) ? esc_url( $option['logo']['mobile'] ) : esc_url( $option['logo']['desktop'] );
	 				
	 				
	 			_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');
	 				
	 		} else {
	 			/*If mobile logo is not set default to desktop logo*/

	 			$img_mobile_class = isset( $option['logo']['mobile'] ) ? 'visible-xs' : '';
	 				
	 			$img_mobile_src = esc_url( $option['logo']['desktop'] );
	 				
	 				
	 			_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');
	 		}
			
			
		}
				
		_e('</a></div>');
	}