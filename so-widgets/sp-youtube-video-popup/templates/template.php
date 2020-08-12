<?php
	global $youtube;
	$height = !empty( $instance['video_height'] ) ? $instance['video_height'] : '160px';
	$youtube->create_video_thumb( $instance['video_url'], $height );
?>
