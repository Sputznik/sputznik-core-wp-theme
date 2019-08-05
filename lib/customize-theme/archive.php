<?php
add_action('customize_register', function( $wp_customize ){

  global $sp_customize;

  $sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_archive_section', 'Archive Section', 'Change Template For Archives');

  /** SINGLE POST TYPE TEMPLATES */
  $templates_arr = apply_filters( 'sp_single_template_options', array(
    'archive1' => 'Three Grid',
    //'tax2' => 'Three Grid',
    // 'single3' => 'Blog Post',
    //'template4'	=> 'Template 4'
  ) );

  //$sp_customize->dropdown( $wp_customize, 'sp_single_post_section', '[single_template]', 'Template Type', 'template1', $templates_arr);

  // For Post Types
  // $args = array( 'public' => true,);
  $args = array( 'public' => true,);
  $post_types = get_post_types( $args );

  foreach ( $post_types as $slug => $value ) {
      if( !( in_array( $value, array( 'orbit-fep', 'attachment', 'page' ) ) ) ){

        $key = "[archive_".$value."_template]";
        $label = "Template Type for $value";

        $sp_customize->dropdown( $wp_customize, 'sp_archive_section', $key, $label, 'archive1', $templates_arr );
      }
  }

});
