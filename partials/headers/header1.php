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
		<div class="container header1">
			<div class="row">
				<div class="col-md-12"><?php the_sp_logo();?></div>
			</div>
		</div>