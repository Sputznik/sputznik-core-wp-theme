<?php
	
	
	class SP_CUSTOMIZE{
		
		function __construct(){
			
			add_action( 'wp_head', array( $this, 'styles') );
			
		}
		
		function styles(){
			
			echo "<style type='text/css'>";
			do_action('sp_styles');
			echo "</style>";
			
		}
		
		function get_social_icons(){
			return array(
				'fb' => array(
					'label'	=> 'Facebook',
					'icon'	=> 'fa fa-facebook-square fa-2x'
				),
				'tw' => array(
					'label'	=> 'Twitter',
					'icon'	=> 'fa fa-twitter-square fa-2x'
				),
				'mail' => array(
					'label'	=> 'Email',
					'icon'	=> 'fa fa-envelope fa-2x'
				),
			);
		}
		
		function get_header_type(){
			
			$header_type = get_option('sp_header_type');
			
			if( !isset( $header_type ) ){
				$header_type = 'header1';
			}
			
			return $header_type;
		}
		
		function panel( $wp_customize, $id, $label){
			
			$wp_customize->add_panel($id, array(
				'priority' 		=> 30,
				'capability' 	=> 'edit_theme_options',
				'theme_supports'=> '',
				'title' 		=> $label,
				'description' 	=> '',
			) );
		
		}
		
		function section( $wp_customize, $panel, $id, $label, $desc){
		
			
			$wp_customize->add_section( $id , array(
	    		'title'       	=> __( $label, 'sp' ),
		    	'priority'    	=> 30,
		    	'description' 	=> $desc,
		    	'panel'			=> $panel	
			) );
		
		}
		
		
		
		function color( $wp_customize, $section, $id, $label, $default ){
			
			$this->add_setting( $wp_customize, $id, $default );

    		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
          		'label' => $label,
          		'section' => $section,
          		'settings' => $id,
    		)));
			
			
			
			
		}
		
		function checkbox( $wp_customize, $section, $id, $label ){
			
			$wp_customize->add_setting($id, array(
				'default' => 0,
      			'capability' => 'edit_theme_options',
      			'type'       => 'option',
      		));
		
			$wp_customize->add_control($id, array(
      			'settings' 	=> $id,
      			'label'    	=> __($label),
      			'section'  	=> $section,
      			'type'     	=> 'checkbox',
      			'std' 		=> 1
      		));
			
			
		}
		
		
		function text( $wp_customize, $section, $id, $label, $default){
			
			$wp_customize->add_setting($id, array(
       			'default' 	=> $default,
       			'capability'=> 'edit_theme_options',
       			'type'      => 'option',
    		));
 		
			$wp_customize->add_control($id, array(
				'settings' 	=> $id,
	    		'type' 		=> 'text',
    	    	'label' 	=> $label,
        		'section' 	=> $section,
	        ));
		
		}
		
		function textarea( $wp_customize, $section, $id, $label, $default){
			
			$wp_customize->add_setting($id, array(
       			'default' 	=> $default,
       			'capability'=> 'edit_theme_options',
       			'type'      => 'option',
    		));
 		
			$wp_customize->add_control($id, array(
				'settings' 	=> $id,
	    		'type' 		=> 'textarea',
    	    	'label' 	=> $label,
        		'section' 	=> $section,
	        ));
		
		}
		
		function dropdown( $wp_customize, $section, $id, $label, $default, $choices){
			
			$this->add_setting( $wp_customize, $id, $default );
			
			$wp_customize->add_control( $id, array(
				'type' 		=> 'select',	
		    	'label'    	=> $label,
		    	'section'  	=> $section,
		    	'settings' 	=> $id,
		    	'choices' 	=> $choices
			));
		}
		
		function image( $wp_customize, $section, $id, $label, $default){
			
			$this->add_setting( $wp_customize, $id, $default );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array(
          		'label' 	=> $label,
          		'section' 	=> $section,
          		'settings' 	=> $id,
			)));
		}
		
		/* wrap add setting function of wp customize */
		function add_setting($wp_customize, $id, $default){
			
			$wp_customize->add_setting( $id, array(
      			'default' => $default,
      			'transport'   => 'refresh',
      			'type' => 'option'
      		) );
			
		}
		
		function list_google_fonts(){
			
			$google_fonts = array(
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
  			);
			
			return apply_filters( 'sp_list_google_fonts', $google_fonts );
	  		
	  	}
		
		function selected_fonts(){
			
			$sp_fonts = get_option('sp_fonts');
			
			return array(
				'body'	=>  isset( $sp_fonts['body'] ) ? $sp_fonts['body'] : "Open Sans",
				'nav'	=> 	isset( $sp_fonts['nav'] ) ? $sp_fonts['nav'] : "Open Sans",
				'head'	=> 	isset( $sp_fonts['head'] ) ? $sp_fonts['head'] : "Open Sans",
			);
		}
	}
	
	global $sp_customize;
	
	$sp_customize = new SP_CUSTOMIZE;
	
	