<?php

	//ORBIT_UTIL::getInstance()->test( $instance );



?>

<div class="row sp-list-users">
	<?php foreach( $instance['items'] as $item ):?>
		<?php

			$image = wp_get_attachment_url( $item['avatar']);


		?>
	<div class="col-lg-4 col-sm-6 user">
		<div class="layer1">
			<div class="user-avatar" style="background-image:url('<?php echo $image;?>');"></div>
		</div>
		<div class="layer2">
			<div class="user-name"><?php echo $item['name'];?></div>
			<div class="user-designation"><?php echo $item['designation'];?></div>
		</div>
		<?php if( isset( $item['description'] ) && $item['description'] ):?>
		<div class="layer3"><?php echo $item['description'];?></div>
		<?php endif;?>
	</div>
	<?php endforeach;?>
</div>
