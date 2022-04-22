<?php

class SP_USERS_GRID extends SP_BASE {

	function parent_class(){
		return "sp-grid-users";
	}

	function user_html( $user ){
		// Parameters: image, name, designation, description
		ob_start();
		?>
		<div class="sp-user-card">
      <a data-target="#sp-user-modal" data-behaviour="sp-grid-user-popup">
        <div class="sp-user-body">
          <div class="user-thumbnail-bg" style="background-image: url( '<?php _e( $user['image'] );?> ');"></div>
          <div class="user-meta">
            <h5 class="name"><?php _e( $user['name'] );?></h5>
            <span class="designation"><?php _e( $user['designation'] );?></span>
          </div>
          <div class="description" style="display:none;height:0;">
            <?php echo $user['description'];?>
          </div>
        </div>
      </a>
    </div>
		<?php return ob_get_clean();
	}

}
