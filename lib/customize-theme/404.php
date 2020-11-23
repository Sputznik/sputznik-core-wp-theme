<?php

add_action( 'customize_register', function( $wp_customize ){

  global $sp_customize;;

  $sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );

  $sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_404_section', '404 Template', 'Change 404 Template' );

  // FECTH ALL THE PAGES FROM BACKEND
  $pages_arr = $sp_customize->get_error_template();

  $sp_customize->dropdown( $wp_customize, 'sp_404_section', '[404_template]', '404 Template', 'default', $pages_arr );

});
