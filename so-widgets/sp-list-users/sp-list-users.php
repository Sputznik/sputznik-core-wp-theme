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

		parent::__construct(
			'sp-list-users',
			__('Sputznik List Users', 'siteorigin-widgets'),
			array(
				'description' => __('Listing of users with different styles & themes.', 'siteorigin-widgets'),
				'help'        => '',
			),
			array(),
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
						'email' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Email', 'siteorigin-widgets' ),
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
				'design'	=> array(
					'type'	=> 'section',
					'label' => __( 'Design' , 'siteorigin-widgets' ),
	 				'hide' => true,
	 				'fields' => array(
						'style' => array(
							'type' 		=> 'select',
							'label' 	=> __( 'Choose Style', 'siteorigin-widgets' ),
							'default' 	=> 'grid3',
							'options' 	=> array(
								'grid3'				=> 'Grid - 3 Columns',
								'grid3-hover'	=> 'Grid - 3 Columns With Hover',
								'grid5'				=> 'Grid - 5 Columns'
							)
						),
					)
				)
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
