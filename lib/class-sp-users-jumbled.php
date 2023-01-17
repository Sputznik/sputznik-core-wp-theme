<?php

class SP_USERS_JUMBLED extends SP_BASE{

	function parent_class(){
		return "sp-list-users";
	}

	function user_html( $user ){
		/*
		* image, name, designation, description, email
		*/

		//print_r( $user );

		$classes = array( 'user' );
		if( isset( $user['description'] ) && $user['description'] ){
			array_push( $classes, 'has-layer3' );
		}

		ob_start();
		?>

		<div class="<?php _e( implode( ' ', $classes ) );?>">
			<div class="layer1">
				<img src="<?php echo $user['image'];?>" />
				<!--div class="user-avatar" style="background-image:url('<?php echo $user['image'];?>');"></div-->
			</div>
			<div class="layer2">
				<div class="user-name"><?php echo $user['name'];?></div>
				<div class="user-designation"><?php echo $user['designation'];?></div>
				<div class="user-email"><?php echo $user['email'];?></div>
				<div class="decoration-wrapper">
					<div class="decoration"></div>
				</div>
			</div>
			<?php if( isset( $user['description'] ) && $user['description'] ):?>
			<div class="layer3"><?php echo $user['description'];?></div>
			<?php endif;?>
		</div>

		<?php return ob_get_clean();

	}

}
