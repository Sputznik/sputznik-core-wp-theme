<?php

	if( !isset( $instance['show_slides'] ) ){
		$instance['show_slides'] = 6;
	}

?>

<!-- Logos -->
<div class="fullwidth">
	<div class="container-logos" style="max-width:1170px;">
		<h3 class="thin"><?php _e( $instance['title'] );?></h3>
		<section data-behaviour="logos-slick" data-items="<?php _e( $instance['show_slides'] );?>" class="customer-logos slider">
			<?php foreach( $instance['slides'] as $slide ):?>
			<div class="slide">
				<img src="<?php _e( wp_get_attachment_url( $slide['image'] ) );?>" />
			</div>
			<?php endforeach;?>
		</section>
	</div>
</div>
<!-- End Logos -->
