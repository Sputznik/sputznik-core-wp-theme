<?php

	require_once('wp_bootstrap_navwalker.php');
	
	add_action('wp_enqueue_scripts', function(){
		
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
		
		wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3./js/bootstrap.min.js', array('jquery'), null, true );
		
		wp_enqueue_script( 'sputznik', get_template_directory_uri() . '/js/script.js', array('bootstrap'), null, true );
		
	});
	
	/**registering nav menu*/

	register_nav_menus( array(
	
		'primary' => __( 'Primary Menu', 'SPUTZNIK' ),

	) );
	
	add_filter('show_admin_bar', '__return_false');