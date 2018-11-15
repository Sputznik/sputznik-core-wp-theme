<?php
	
	
	class SP_THEME{
		
		var $admin;
		
		function __construct(){
			
			// LOAD THE ADMIN CLASS THAT HAS ALL THE TAXONOMIES, POST TYPES AND CUSTOM META BOXES WITH THIER
			// RESPECTIVE FIELDS
			require_once('class-sp-theme-admin.php');
			$this->admin = new SP_THEME_ADMIN;
			
			add_filter( 'body_class', function( $classes ){
				
				
				global $sp_customize;
				$header_type = $sp_customize->get_header_type();
				
				if( $header_type ){
					
					$classes[] = 'with-'.$header_type;
					
					if( 'header3' == $header_type && !sp_is_sticky_nav_transparent() ){
						$classes[] = 'with-solid-menu';
						
					}
					
				}
			
				return $classes;
			});
			
			
		}
		
		function get_col_class( $cols = 4 ){
			
			$col_class = "col-sm-12";
			
			switch( $cols ){
				
				case '2':
					$col_class = "col-sm-6";
					break;
				
				case '3':
					$col_class = "col-sm-4";
					break;
					
				case '4':
					$col_class = "col-lg-3 col-sm-6";
					break;
			
			}
			
			
			return $col_class;
		}
		
		function getUniqueID( $data ){
			return substr( md5( json_encode( $data ) ), 0, 8 );
		}
		
	}
	
	global $sp_theme;
	
	$sp_theme = new SP_THEME;