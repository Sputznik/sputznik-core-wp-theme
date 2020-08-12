<?php
	global $youtube;
	$img_path = get_template_directory_uri().'/images/play-btn.png';
	$height = !empty( $instance['video_height'] ) ? $instance['video_height'] : '160px';
	$youtube->create_video_thumb( $instance['video_url'], $height );
?>
<style>
.sp-youtube-frame .play-btn:after {content: url('<?php _e( $img_path );?>');}
</style>
