<?php $logo = get_option( 'sp_logo' );?>
<div class="logo">
	<a href="<?php bloginfo('url');?>">
		<?php if( isset( $logo['desktop'] ) && $logo['desktop'] ):?>
		<img class="<?php if( isset( $logo['mobile'] ) ):?>hidden-xs<?php endif;?>" src="<?php echo esc_url( $logo['desktop'] );?>">
		<?php endif;?>
		<?php if( isset( $logo['mobile'] ) && $logo['mobile'] ):?>
		<img class="visible-xs" src="<?php echo esc_url( $logo['mobile'] );?>">
		<?php endif;?>
	</a>
</div>
