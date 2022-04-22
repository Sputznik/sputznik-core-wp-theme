<?php

	$layout_type = $instance['layout_type'];
	$sp_users_ui = ( $layout_type == 'default' ) ? SP_USERS_JUMBLED::getInstance() : SP_USERS_GRID::getInstance();
	$classes = array( $sp_users_ui->parent_class() );

	if( $layout_type == 'default' && isset( $instance['design'] ) && isset( $instance['design']['style'] ) ){
		array_push( $classes, $instance['design']['style'] );
	}

?>
<div class="<?php echo implode( ' ', $classes );?>">
	<?php foreach( $instance['items'] as $item ):?>
		<?php
			$item['image'] = wp_get_attachment_url( $item['avatar']);
			echo $sp_users_ui->user_html( $item );
		?>
	<?php endforeach;?>
</div>
