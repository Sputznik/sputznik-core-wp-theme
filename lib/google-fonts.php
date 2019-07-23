<?php

	add_filter( 'sp_list_google_fonts', function( $fonts ){

		$fonts[] = array(
			'slug'	=> 'mukta',
			'name'	=> 'Mukta',
			'url'	=> 'Mukta'
		);

		$fonts[] = array(
			'slug'	=> 'noto',
			'name'	=> 'Noto Serif',
			'url'	=> 'Noto+Serif'
		);

		$fonts[] = array(
			'slug'	=> 'oswald',
			'name'	=> 'Oswald',
			'url'	=> 'Oswald:300,400'
		);

		$fonts[] = array(
  			'slug'	=> 'lora',
	  		'name'	=> 'Lora',
  			'url'	=> 'Lora:400,700,400italic,700italic'
  		);

		$fonts[] = array(
  			'slug'	=> 'raleway',
	  		'name'	=> 'Raleway',
  			'url'	=> 'Raleway:400,700'
  		);


	  	$fonts[] =	array(
  			'slug'	=> 'merriweather',
  			'name'	=> 'Merriweather',
  			'url'	=> 'Merriweather:400,400italic,700,700italic'
	  	);

		$fonts[] = array(
  			'slug'	=> 'arvo',
  			'name'	=> 'Arvo',
  			'url'	=> 'Arvo:400,700,400italic,700italic'
	  	);

		$fonts[] = array(
  			'slug'	=> 'muli',
  			'name'	=> 'Muli',
  			'url'	=> 'Muli:400,400italic'
	  	);

		$fonts[] = array(
  			'slug'	=> 'nunito',
  			'name'	=> 'Nunito',
  			'url'	=> 'Nunito:400,700'
  		);

		$fonts[] = array(
  			'slug'	=> 'alegreya',
  			'name'	=> 'Alegreya',
  			'url'	=> 'Alegreya:400italic,700italic,400,700'
  		);

		$fonts[] = array(
			'slug'	=> 'exo2',
  			'name'	=> 'Exo 2',
  			'url'	=> 'Exo+2:400,400italic,700,700italic'
	  	);

		$fonts[] = array(
  			'slug'	=> 'crimson',
  			'name'	=> 'Crimson Text',
  			'url'	=> 'Crimson+Text:400,400italic,700,700italic'
	  	);

		$fonts[] = array(
  			'slug'	=> 'lobster',
  			'name'	=> 'Lobster Two',
  			'url'	=> 'Lobster+Two:400,400italic,700,700italic'
  		);

		$fonts[] = array(
  			'slug'	=> 'maven',
  			'name'	=> 'Maven Pro',
  			'url'	=> 'Maven+Pro:400,500,700,900'
  		);

		return $fonts;

	});
