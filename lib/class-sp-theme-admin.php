<?php

	class SP_THEME_ADMIN{

		var $meta_boxes;
		var $taxonomies;
		var $post_types;

		function __construct(){

			add_action( 'init', array( $this, 'create') );			// REGISTERING POST TYPES AND TAXONOMIES

			$this->set_post_types();

			$this->set_taxonomies();

			$this->set_meta_boxes();

			/* SAVE POST - FOR SAVING META FIELDS */
			add_action( 'save_post', array( $this, 'save_meta_fields' ), 10, 2 );


			add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );

		}

		/* SET POST TYPES */
		function set_post_types(){

			$this->post_types = array();
		}
		function get_post_types(){ return $this->post_types; }

		/* TAXONOMIES */
		function set_taxonomies(){
			$this->taxonomies = array();
		}

		function get_taxonomies(){ return $this->taxonomies; }

		function set_meta_boxes(){

			$this->meta_boxes = array(
				'settings_box'	=> array(
					'title'		=> 'Page Settings',
					'fields'	=> array(
						'sticky_transparent' => array(
							'label'		=> 'Transparent Header',
							'desc'		=> 'Only works for Sticky Transparent Menu',
							'type'		=> 'boolean',
							'default'	=> false
						),
					),
					'post_type'	=> $this->display_transparent_header(),
					// 'post_type'	=> array( 'orbit-1' ),
					'context'	=> 'side',
					'priority'	=> 'default'
				),
			);

		}

		function display_transparent_header(){

			$allTypes = array();

			$get_types = get_post_types( array( 'public' => true ), 'names' );
			 // Gets orbit bundle post types
			$args = array(
				'post_type'       => 'orbit-types',
				'posts_per_page'  =>  -1
			);
			 $query = new WP_Query( $args );

			foreach ( $query->posts as $key => $value) {
				$get_types[$value->post_name] = $value->post_title;
			}

			/*
			foreach ( $get_types as $slug => $post_type ) {
				if( !( in_array( $slug, array( 'attachment' ) ) ) ){
					$allTypes[$post_type] = $slug;
				}
			}
			*/

			$allTypes = array_keys( $get_types );
			unset( $allTypes[2] );
			//$types = implode( ',', $allTypes );

			//$custom_types = explode( ',', $types );
			// echo "<pre>";
			// print_r( $allTypes );
			// echo "</pre>";
			// wp_die();
			return $allTypes;
		}

		function get_meta_boxes(){ return $this->meta_boxes; }

		function create(){

			/* registering post types */
			foreach( $this->get_post_types() as $slug => $post_type ){
				register_post_type( $slug,
					array(
						'labels' => array(
							'name' 			=> $post_type['name'],
							'singular_name' => $post_type['singular_name'],
							'add_new'	 	=> 'Add New Item',
							'add_new_item' 	=> 'Add New Item',
							'edit' 			=> 'Edit',
							'edit_item' 	=> 'Edit',
							'new_item' 		=> 'New',
							'view' 			=> 'View',
							'view_item' 	=> 'View',
						),
						'public' 		=> true,
						'supports' 		=> $post_type['supports'],
						'menu_icon' 	=> $post_type['menu_icon'],
						'has_archive' 	=> $post_type['has_archive'],
						'rewrite' 		=> isset( $post_type['rewrite'] ) ? $post_type['rewrite'] : array( 'slug' => $slug, 'with_front'=> false, 'feed' => true, 'pages' => true )
					)
				);
			}

			/* registering taxonomies */
			foreach( $this->get_taxonomies() as $slug => $tax ){
				register_taxonomy(
					$slug,
					$tax['post_type'],
					array(
						'labels' 		=> $tax['labels'],
						'show_ui' 		=> true,
						'show_tagcloud' => false,
						'hierarchical' 	=> true,
						'query_var' 	=> true,
						'rewrite' 		=> array('slug' => $slug )
					)
				);
			}

			/* META BOXES */
			add_action( 'admin_init', function(){

				foreach( $this->get_meta_boxes() as $slug => $metabox ){

					$metabox['context'] = $metabox['context'] ? $metabox['context'] :  'normal';

					$metabox['priority'] = $metabox['priority'] ? $metabox['priority'] :  'default';

					/* ADD META BOX */
					add_meta_box( $slug, $metabox[ 'title' ], array( $this, 'meta_box' ), $metabox['post_type'], $metabox['context'], $metabox['priority']);
				}
			} );

		}

		/* META BOXES */
		function meta_box( $post, $metabox ) {

			// GET THE METABOX ID, IF NOT THEN RETURN
			if( !is_array( $metabox ) || !isset( $metabox['id'] ) ){ return; }
			$slug = $metabox['id'];

			// GET THE REGISTERED META BOX FIELDS
			$metaboxes = $this->get_meta_boxes();
			if( !is_array( $metaboxes ) || !isset( $metaboxes[ $slug ] ) ){ return ;}
			$fields = $metaboxes[ $slug ][ 'fields' ];

			// ITERATING THROUGH EACH FIELD
			foreach( $fields as $slug => $field ){

				// GETTING VALUE FROM THE DB
				$value = esc_html( get_post_meta( $post->ID, $slug, true ) );

				// CHECKING IF THE FIELDS IS AN ARRAY OR NEEDS TO INVOKE THE LEGACY CODE
				if( is_array( $field ) && isset( $field[ 'type' ] ) ){
					$template_file = false;
					switch( $field[ 'type' ] ){
						case 'boolean':
							$template_file = "metafield_boolean.php";
							break;
					}

					if( $template_file ){
						include "templates/".$template_file;
					}

				}
				else{
					// LEGACY CODE ONLY APPICABLE FOR TEXT FIELDS
					$label = $field;
					include "templates/metafield_text.php";
				}
			}

		}

		/* SAVE META BOXES */
		function save_meta_fields( $post_id, $post ){

			$metaboxes = $this->get_meta_boxes();

			foreach( $metaboxes as $metabox ){

				$flag = false;

				// CHECK IF THIS METABOX IS VALID FOR THE CURRENT SCREEN
				if( isset( $metabox['post_type'] ) ){
					if( ( is_array( $metabox['post_type'] ) && in_array( $metabox['post_type'], array( $post->post_type ) ) ) || ( $metabox['post_type'] == $post->post_type ) ){
						$flag = true;
					}
				}

				if( $flag ){

					$fields = $metabox['fields'];

					foreach( $fields as $slug => $field ){									/* ITERATE THROUGH THE FIELDS */

						if ( isset( $_POST[ $slug ] ) ) {
							update_post_meta( $post_id, $slug, $_POST[ $slug ] );			/* Store data in post meta table if present in post data */
						}

						if( !isset( $_POST[ $slug ] ) && is_array( $field ) && isset( $field['type'] ) && $field['type'] == 'boolean' ){
							delete_post_meta( $post_id, $slug );
						}
					}
				}

			}

		}

		function assets(){
			wp_enqueue_style( 'sp-fonts', get_template_directory_uri() .'/css/fonts.css', array(), '1.0.1' );
		}


	}
