<?php
add_action('customize_register', function( $wp_customize ){

  global $sp_customize;

  $sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_single_post_section', 'Single Post Section', 'Change Template For Single Post');



  /** SINGLE POST TYPE TEMPLATES */
  $templates_arr = apply_filters( 'sp_single_template_options', array(
    'single1' => 'Default',
    'single2' => 'Overlay featured image',
    'single3' => 'Blog Post',
    //'template4'	=> 'Template 4'
  ) );

    $sp_customize->dropdown( $wp_customize, 'sp_single_post_section', '[single_template]', 'Template Type', 'template1', $templates_arr);

});
