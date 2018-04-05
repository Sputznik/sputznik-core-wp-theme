<?php
	
	
	class SP_THEME{
		
		
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
		
		
	}
	
	global $sp_theme;
	
	$sp_theme = new SP_THEME;
	
	