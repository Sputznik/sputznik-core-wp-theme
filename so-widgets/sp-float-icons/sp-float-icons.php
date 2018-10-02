<?php
/*
	Widget Name: Sputznik Floating Icons
	Description: Floating Icons on desktop and bottom fixed on mobile. These icons can be used as social media icons or custom purposes. 
	Author: Samuel V Thomas, Sputznik
	Author URI: http://sputznik.com
	Widget URI: 
	Video URI: 
*/
class SP_Float_Icons extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'sp-float-icons',
			// The name of the widget for display purposes.
			__('Sputznik Floating Icons', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Floating Icons on desktop and bottom fixed on mobile. These icons can be used as social media icons or custom purposes.', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'icons' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Icons Section' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Icon', 'siteorigin-widgets' ),
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __( 'Select Icon', 'siteorigin-widgets' )
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color', 'siteorigin-widgets' )
						),
						'is_modal' => array(
							'type' => 'checkbox',
							'label' => __( 'Open Modal Box', 'siteorigin-widgets' ),
							'default' => true,
							'state_emitter' => array(
								'callback' 	=> 'conditional',
								'args' 		=> array( 
									'type_{$repeater}[active]: val',
									'type_{$repeater}[inactive]: !val' 
								)
							),
						),
						'modal_builder' => array(
							'type' => 'builder',
							'label' => __( 'Modal Content', 'widget-form-fields-text-domain'),
							'state_handler' => array(
								'type_{$repeater}[active]' 	=> array('show'),
								'_else[type_{$repeater}]' 	=> array('hide'),
							),
						),
						'link' => array(
							'type' => 'text',
							'label' => __( 'Link for Icon', 'siteorigin-widgets' ),
							'state_handler' => array(
								'type_{$repeater}[active]' 	=> array('hide'),
								'_else[type_{$repeater}]' 	=> array('show'),
							),
						),
					)
				)
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/sp-float-icons"
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
siteorigin_widget_register('sp-float-icons', __FILE__, 'SP_Float_Icons');