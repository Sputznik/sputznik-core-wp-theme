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

			/* LOAD ASSETS */
			add_action('wp_enqueue_scripts', array( $this, 'assets' ) );

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

		function assets(){

			//enqueue style
			wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false, null );
			wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );

			$google_fonts_url = apply_filters('sp_google_fonts_url', 'http://fonts.googleapis.com/css?family=Oswald:300,400');

			wp_enqueue_style('google-fonts', $google_fonts_url, false, null );

			wp_enqueue_style( 'sp-core-style', get_template_directory_uri() .'/css/main.css', array('bootstrap', 'font-awesome', 'google-fonts'), SPUTZNIK_THEME_VERSION );

			wp_enqueue_style( 'extras', get_template_directory_uri() .'/css/extras.css', array(), SPUTZNIK_THEME_VERSION );

			wp_enqueue_style( 'sp-fonts', get_template_directory_uri() .'/css/fonts.css', array('sp-core-style'), SPUTZNIK_THEME_VERSION );

			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

			wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), null, true );

			wp_enqueue_script( 'sputznik', get_template_directory_uri() . '/js/script.js', array('bootstrap'), SPUTZNIK_THEME_VERSION, true );

		}


	}

	global $sp_theme;

	$sp_theme = new SP_THEME;
