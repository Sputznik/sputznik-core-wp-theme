<?php
$img_path = get_template_directory_uri().'/images/play-btn.png';
$video_height = $height;
$embed_url = $this->get_youtube_link( $url  );
$thumbnail = $this->get_video_thumbnail( $url, $resolution );
?>
<div class="sp-youtube-frame" style="background-image: url(<?php _e( $thumbnail );?>);height: <?php _e($height);?>">
  <a class="play-btn" href="#sp-youtube-modal" data-toggle="modal" data-behaviour="sp-youtube" data-url="<?php _e( $embed_url );?>" aria-label="Play Button">
    <div class="overlay"></div>
  </a>
</div>
<style>
  .sp-youtube-frame .play-btn:after {content: url('<?php _e( $img_path );?>');}
</style>
