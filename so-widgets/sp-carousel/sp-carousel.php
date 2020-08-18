<?php
/*
	Widget Name: Sputznik Carousel
	Description: Sputznik Carousel with Video Popup
	Author: Stephen Anil, Sputznik
	Author URI:	http://sputznik.com
	Widget URI:
	Video URI:
*/
class SP_Custom_Carousel extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'sp-carousel',
			// The name of the widget for display purposes.
			__('Sputznik Carousel', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Sputznik Carousel with video popup.', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'carousel_items' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Carousel Items' , 'siteorigin-widgets' ),
					'item_label' => array(
						'selector' => "[id*='caption']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'carousel_caption' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Caption', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'video_url' => array(
							'type' 			=> 'link',
							'label' 		=> __( 'Video Url', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'carousel_image' => array(
							'type' 			=> 'media',
							'label' 		=> __( 'Choose Image', 'siteorigin-widgets' ),
							'choose' 		=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 		=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
					)
				),
				'carousel_height' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Carousel Height', 'siteorigin-widgets' ),
					'default' 	=> '80vh',
					'description'	=>	__( 'Must be in vh. Default value 80vh. Max value 100vh', 'siteorigin-widgets' ),
				),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/sp-carousel"
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
siteorigin_widget_register('sp-carousel', __FILE__, 'SP_Custom_Carousel');
