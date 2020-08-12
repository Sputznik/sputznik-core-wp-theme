<?php
/*
	Widget Name: Sputznik Youtube Video Popup
	Description: Sputznik Youtube Video Popup SOW
	Author: Stephen Anil, Sputznik
	Author URI:	http://sputznik.com
	Widget URI:
	Video URI:
*/
class SP_Youtube_Video_Popup extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'sp-youtube-video-popup',
			// The name of the widget for display purposes.
			__('Sputznik Youtube Video Popup', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Sputznik Youtube Video Popup SOW.', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'video_url' => array(
					'type' 			=> 'link',
					'label' 		=> __( 'Youtube Video URL', 'siteorigin-widgets' ),
					'default' 	=> '',
				),
				'video_height' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Video Thumbnail Height', 'siteorigin-widgets' ),
					'default' 	=> '160px',
					'description'	=>	__( 'Must be in pixels. Default value 160px', 'siteorigin-widgets' ),
				),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/sp-youtube-video-popup"
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
siteorigin_widget_register('sp-youtube-video-popup', __FILE__, 'SP_Youtube_Video_Popup');
