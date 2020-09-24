<?php

	$sp_users_ui = SP_USERS_JUMBLED::getInstance();

?>
<div class="<?php echo $sp_users_ui->parent_class();?>">
	<?php foreach( $instance['items'] as $item ):?>
		<?php
			$item['image'] = wp_get_attachment_url( $item['avatar']);
			echo $sp_users_ui->user_html( $item );
		?>
	<?php endforeach;?>
</div>
