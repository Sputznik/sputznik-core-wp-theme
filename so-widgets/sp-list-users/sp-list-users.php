<?php
/*
	Widget Name: Sputznik List Users
	Description: Listing of users with different styles & themes
	Author: Samuel Thomas, Sputznik
	Author URI:	http://sputznik.com
	Widget URI:
	Video URI:
*/
class SP_List_Users extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'sp-list-users',
			// The name of the widget for display purposes.
			__('Sputznik List Users', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Listing of users with different styles & themes.', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'items' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Users' , 'siteorigin-widgets' ),
					'item_label' => array(
						'selector' => "[id*='name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'name' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Name', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'designation' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Designation', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'avatar' => array(
							'type' 			=> 'media',
							'label' 		=> __( 'Choose Image', 'siteorigin-widgets' ),
							'choose' 		=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 		=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'description' => array(
							'type' 			=> 'tinymce',
							'label' 		=> __( 'Description', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
					)
				),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/sp-list-users"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}
	function get_template_dir($instance) {
		return 'templates';
	}
    function get_style_name($instance) {
        return '';
    }
}
siteorigin_widget_register('sp-list-users', __FILE__, 'SP_List_Users');
