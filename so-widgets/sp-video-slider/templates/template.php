<?php

	global $youtube;
	$design 					= $instance['design'];
	$slide_count 			= !empty( $instance['show_slides'] ) ? $instance['show_slides'] : '4';
	$title_color      = !empty( $design['title_color'] ) ? $design['title_color'] : '#000000';
	$desc_color     	= !empty( $design['desc_color'] ) ? $design['desc_color'] : '#888888';
	$indicators_color = !empty( $design['indicators_color'] ) ? $design['indicators_color'] : '#a14200';
	$arrow_bg_color   = !empty( $design['arrow_bg_color'] ) ? $design['arrow_bg_color'] : '#ffffff';
	$play_btn_url  		= wp_get_attachment_url( $design['play_btn_image']);

?>

<!-- Video Slider -->
<div class="fullwidth">
	<div class="sp-video-slider" data-play_btn_img="<?php _e( $play_btn_url );?>">
		<div class="sp-video-slider-inner" data-behaviour="sp-video-slider" data-items="<?php _e( $slide_count );?>">
		<?php foreach( $instance['slides'] as $slide ):?>
			<div class="sp-video-slide-item">
				<?php $youtube->create_video_thumb( $slide['video_url'], $slide['video_title'], '200px' );?>
				<h3><?php _e($slide['video_title']);?></h3>
				<p class="desc"><?php _e($slide['video_desc']);?></p>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
<!-- End Video Slider -->

<style>

.sp-video-slider-inner button.slick-prev,
.sp-video-slider-inner button.slick-next{
	background: <?php _e($arrow_bg_color);?>;
}

.sp-video-slider .sp-video-slide-item > h3{ color: <?php _e($title_color);?>; }
.sp-video-slider .sp-video-slide-item p.desc{ color: <?php _e($desc_color);?>; }

.sp-video-slider ul.slick-dots li button:hover,
.sp-video-slider ul.slick-dots li.slick-active button{
	background: <?php _e($indicators_color);?>;
	border-color: <?php _e($indicators_color);?>;
}

</style>
