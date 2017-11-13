<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Patua+One|Oswald:300,400" rel="stylesheet" type="text/css">	
		<link href="<?php bloginfo('template_url');?>/style.css?v=1.0" rel="stylesheet">
		<?php wp_head();?>
	</head>
	<body>
		
		<div id="wrapper">
			<div class="overlay"></div>
			
			<!-- Sidebar -->
			<?php	
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'navbar navbar-inverse navbar-fixed-top',
					'container_id'      => 'sidebar-wrapper',
					'menu_class'        => 'nav sidebar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
			?>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
					<span class="hamb-top"></span>
					<span class="hamb-middle"></span>
					<span class="hamb-bottom"></span>
				</button>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="logo">
								<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/logo1.png"></a>
							</div>
							<hr>
							<div class="rocket borderdash">
								<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/s-rocket.png"></a>
							</div>
						</div>
					</div>
					<div class="row">