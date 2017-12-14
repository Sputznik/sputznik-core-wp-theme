<?php 
	global $sp_customize;
	
	$icons = $sp_customize->get_social_icons();
	
	/* VALUES FROM THE CUSTOMISE SECTION */
	$icons_val = get_option('sp_social_media');
	
	if( isset( $icons_val ) ): 
?>
<ul class="list-inline text-center">
	<?php foreach( $icons as $slug => $icon ):if( isset( $icons_val[ $slug ] ) ):?>
	<li><a href="<?php _e( $icons_val[ $slug ] );?>" target="_blank"><i class="<?php _e( $icon['icon'] );?>"></i></a></li>
	<?php endif;endforeach;?>
</ul>
<?php endif;?>