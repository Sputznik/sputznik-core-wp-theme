<?php

	$sp_users_ui = SP_USERS_JUMBLED::getInstance();

	$classes = array( $sp_users_ui->parent_class() );

	if( isset( $instance['design'] ) && isset( $instance['design']['style'] ) ){
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
