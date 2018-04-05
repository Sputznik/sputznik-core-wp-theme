<?php
	
	$inc_files = array(
		'lib/class-sp-theme.php',
		'lib/wp_bootstrap_navwalker.php',
		'lib/customize-theme/main.php',
		'lib/google-fonts.php',
		'lib/the.php'
	);
	
	foreach($inc_files as $inc_file){
		require_once( $inc_file );
	}
	
	/* LOAD ASSETS */
	add_action('wp_enqueue_scripts', function(){
		
		//enqueue style
		wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', false, null );
		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, null );
		
		$google_fonts_url = apply_filters('sp_google_fonts_url', 'http://fonts.googleapis.com/css?family=Oswald:300,400');
		
		wp_enqueue_style('google-fonts', $google_fonts_url, false, null );
		
		wp_enqueue_style( 'sp-core-style', get_template_directory_uri() .'/css/main.css', array('bootstrap', 'font-awesome', 'google-fonts'), '1.0.1' );
		
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
		
		wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), null, true );
		
		wp_enqueue_script( 'sputznik', get_template_directory_uri() . '/js/script.js', array('bootstrap'), null, true );
		
	});
	
	/** registering nav menu */
	add_action( 'init', function(){
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'SPUTZNIK' ),
			'secondary' => __( 'Secondary Menu', 'SPUTZNIK' )
		) );
	} );
	
	/* HIDE ADMIN BAR FROM THE FRONTEND */
	add_filter('show_admin_bar', '__return_false');
	
	
	add_action( 'widgets_init', function(){
		
		register_sidebar( array(
			'name' => 'Footer Sidebar 1',
			'id' => 'footer-sidebar-1',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 2',
			'id' => 'footer-sidebar-2',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 3',
			'id' => 'footer-sidebar-3',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 4',
			'id' => 'footer-sidebar-4',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		
	} );
	
	