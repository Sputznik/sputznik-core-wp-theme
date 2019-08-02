<?php

	define('SPUTZNIK_THEME_VERSION', '2.0.2' );

	$inc_files = array(
		'lib/class-sp-theme.php',
		'lib/wp-bootstrap-navwalker.php',
		'lib/customize-theme/main.php',
		'lib/google-fonts.php',
		'lib/the.php',
	);

	foreach($inc_files as $inc_file){
		require_once( $inc_file );
	}


	function my_icon_families_filter( $icon_families ) {
		$icon_families['spicons'] = array(
			'name' 		=> 'Sputznik Icons',
			'style_uri' => get_template_directory_uri() . '/css/fonts.css',
			'icons' 	=> array(
				'sp-translate' => 'translate',
			),
		);
		return $icon_families;
	}
	add_filter( 'siteorigin_widgets_icon_families', 'my_icon_families_filter' );


	/* THEME SUPPORT FOR FEATURED IMAGES */
	add_theme_support( 'post-thumbnails' );

	/* ADD SOW FROM THE THEME */
	add_action('siteorigin_widgets_widget_folders', function( $folders ){
		$folders[] = get_template_directory() . '/so-widgets/';
		return $folders;
	});

	/* ADD PREDEFINED LAYOUTS */
	add_filter( 'siteorigin_panels_local_layouts_directories', function( $layout_folders ){
		$layout_folders[] = get_template_directory() . '/lib/layouts';
		return $layout_folders;
	} );




	/** registering nav menu */
	add_action( 'init', function(){
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'SPUTZNIK' ),
			'secondary' => __( 'Secondary Menu', 'SPUTZNIK' )
		) );
	} );

	/* HIDE ADMIN BAR FROM THE FRONTEND */
	add_filter('show_admin_bar', '__return_false');

	/* ADD HEADER */
	add_action('sp_header', function(){
		global $sp_customize;

		$header_type = $sp_customize->get_header_type();

		$header_template = apply_filters( 'sp_'.$header_type.'_template', 'partials/headers/'.$sp_customize->get_header_type().'.php' );

		require_once( $header_template );

	});

	/* HEADER MENU */
	add_action('sp_nav_menu', function(){

		$sp_nav_menu_options = apply_filters( 'sp_nav_menu_options', array(
			'menu'              => 'primary',
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'navbar',
			//'container_id'      => 'sidebar-wrapper',
			'menu_class'        => 'nav sidebar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		));

		wp_nav_menu( $sp_nav_menu_options );

	});

	/* PRINT LOGOS TO THE HEADER */
	add_action('sp_logo', function(){

		$template = apply_filters('sp_logo_template', 'partials/logo.php');

		include( $template );

	}, 1);

	/* PRINT LOGOS TO THE HEADER */
	add_action('sp_sticky_logo', function(){

		$template = apply_filters('sp_sticky_logo_template', 'partials/logo_sticky.php');

		include( $template );

	}, 1);


	add_action( 'widgets_init', function(){

		// built for jagori
		register_sidebar( array(
			'name' 			=> 'Single Post Footer',
			'id' 			=> 'single-post-footer',
			'description' 	=> 'Appears in the single post before the pre-footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		) );

		/*

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
		*/
		register_sidebar( array(
			'name' 			=> 'Pre Footer',
			'id' 			=> 'pre-footer-sidebar',
			'description' 	=> 'Appears before the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		) );

	} );


	function sp_is_sticky_nav_transparent(){
	    global $post, $sp_customize;

	    if( is_search() ){
	    	return 0;
	    }

	    $option = $sp_customize->get_option();

	    if ( isset($option['header_type']) && $option['header_type'] === 'header3' ) {

	    	$val = get_post_meta( $post->ID, $key = 'sticky_transparent', true );

	    	return isset($val) ? (bool)$val : 0;
	    }


	    return 0;
	}


	// ENABLE SEARCH ICON ALONG WITH THE PRIMARY MENU
	add_filter( 'wp_nav_menu_items', function($items, $args){

		global $sp_customize;

		$option = $sp_customize->get_option();

		if( $args->theme_location == 'primary' ){
			if( isset( $option['has_search_icon'] ) &&  $option['has_search_icon'] == 1 ){
				$items .= '<li class="sp_search_item"><a href="#"><i class="fa fa-search" data-toggle="modal" data-target="#search-modal"></i></a></li>';
			}
			if( isset( $option['has_cart_icon'] ) &&  $option['has_cart_icon'] == 1 && class_exists( 'WooCommerce' ) ){
				$items .= '<li class="sp_cart_item"><a href="'.get_permalink( wc_get_page_id( 'cart' ) ).'"><i class="fa fa-shopping-cart"></i><strong class="header-cart-count">'.WC()->cart->get_cart_contents_count().'</strong></a></li>';
			}

		}
		return $items;
	}, 10, 2 );

	// WOOCOMMERCE UPDATE CART COUNT ON AJAX
	add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ){
		$fragments['strong.header-cart-count'] = '<strong class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</strong>';
		return $fragments;
	}, 10, 1 );



	add_action( 'sp_pre_footer', function(){

		if( is_active_sidebar( 'pre-footer-sidebar' ) ){
			dynamic_sidebar( 'pre-footer-sidebar' );
		}

	} );


	add_filter( 'wp_title', function( $title ){

		$sep = " | ";

		if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

		if( is_front_page() ){
			$title = "Home";
		}

    // Add the blog name
    $title = $title . $sep . get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

	  return $title;
	} );

	add_action( 'paginationWithThumbnail', function(){



	} );
