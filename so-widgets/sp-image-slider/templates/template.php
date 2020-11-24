<?php

	if( !isset( $instance['show_slides'] ) ){
		$instance['show_slides'] = 4;
	}
?>
<!-- Image Slider -->
<div class="fullwidth">
	<div class="container-images">
		<section data-behaviour="images-slick" data-items="<?php _e( $instance['show_slides'] );?>" class="customer-images slider">
			<?php foreach( $instance['slides'] as $slide ):?>
			<div class="slide">
				<img src="<?php _e( wp_get_attachment_url( $slide['image'] ) );?>" />
			</div>
			<?php endforeach;?>
		</section>
	</div>
</div>
<!-- End Image Slider -->
