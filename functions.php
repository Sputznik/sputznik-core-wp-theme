<?php
	
	$inc_files = array(
		'lib/class-sp-theme.php',
		'lib/wp_bootstrap_navwalker.php',
		'lib/customize-theme/main.php',
		'lib/the.php'
	);
	
	foreach($inc_files as $inc_file){
		require_once( $inc_file );
	}
	
	
	
	add_action('wp_enqueue_scripts', function(){
		
		//enqueue style
		wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false, null );
		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );
		
		$google_fonts_url = apply_filters('sp_google_fonts', 'http://fonts.googleapis.com/css?family=Patua+One|Oswald:300,400');
		
		wp_enqueue_style('google-fonts', $google_fonts_url, false, null );
		wp_enqueue_style( 'main-style', get_template_directory_uri() .'/style.css', array('bootstrap', 'font-awesome'), '1.2' );
		
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
		
		wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3./js/bootstrap.min.js', array('jquery'), null, true );
		
		wp_enqueue_script( 'sputznik', get_template_directory_uri() . '/js/script.js', array('bootstrap'), null, true );
		
	});
	
	/** registering nav menu */

	register_nav_menus( array(
	
		'primary' => __( 'Primary Menu', 'SPUTZNIK' ),

	) );
	
	add_filter('show_admin_bar', '__return_false');
	
	