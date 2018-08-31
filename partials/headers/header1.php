<div id="wrapper" class="header1">
	<div class="overlay"></div>
			
	<!-- Sidebar -->
	<?php do_action('sp_nav_menu');?>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class='affix-top' data-spy='affix' data-offset-top='30'>
			<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
				<span class="hamb-top"></span>
				<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
			</button> 
			<?php do_action('sp_logo');?>
		</div>
		<?php do_action('sp_header1_after');?>	
		