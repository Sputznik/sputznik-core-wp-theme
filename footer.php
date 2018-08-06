<?php do_action('sp_pre_footer');?>
<footer>
	<div class="container-fluid">
		<div class="row">
		<?php 
			
			global $sp_theme;
			$footer_cols = '4';
			
			for( $i = 1; $i<=$footer_cols; $i++ ){
				
				$footer_col_class = $sp_theme->get_col_class( $footer_cols );
				
				_e('<div id="footer-sidebar'.$i.'" class="'.$footer_col_class.'">');
				if( is_active_sidebar( 'footer-sidebar-'.$i ) ){ dynamic_sidebar( 'footer-sidebar-'.$i ); }
				_e('</div>');
			}
		?>
		</div>
	</div>
	<?php do_action('sp_copyright');?>
</footer>



<?php 
	/* CLOSING THE CONTAINER DIVS FOR HEADER 1 */
	global $sp_customize;
	$header_type = $sp_customize->get_header_type();
	_e('</div><!-- /#page-content-wrapper --></div><!-- /#wrapper -->');
?>

<?php wp_footer();?>
</body>
</html>