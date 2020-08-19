<?php
  $design       = $instance['design_section'];
  $height       = !empty( $design['carousel_height'] ) ? $design['carousel_height'] : '80vh';
  $overlay      = !empty( $design['carousel_overlay'] ) ? $design['carousel_overlay']/10 : '0.4';

?>
<div id="carousel-with-popup" class="carousel slide" data-ride="carousel" data-interval="false">

<!-- Indicators -->
<ol class="carousel-indicators">
	<?php $slide=0; foreach( $instance['carousel_items'] as $item  ):?>
		<?php $indicator=" ";if($slide==0){$indicator= "active";}?>
		<li data-target="#carousel-with-popup" data-slide-to="<?php _e( $slide );?>" class="<?php _e($indicator);?>"></li>
	<?php  $slide++; endforeach;?>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
	<?php $i=0; foreach( $instance['carousel_items'] as $item ):?>
		<?php $class=" ";if($i==0){$class= "active";}
      global $youtube;
      $image = wp_get_attachment_url( $item['carousel_image']);
      $embed_url = $youtube->get_youtube_link( $item['video_url'] );
    ?>
		<div class="item <?php _e( $class );?>">
			<div class="item-body">
        <a href="#sp-youtube-modal" data-behaviour="sp-youtube" data-toggle="modal" data-url="<?php _e($embed_url);?>">
          <div class="carousel-image" style="background-image:url(<?php _e( $image )?>);"></div>
          <div class="carousel-overlay"></div>
          <div class="carousel-caption">
  					<h2 class="cap-txt"><?php _e( $item['carousel_caption'] ); ?></h2>
  				</div>
        </a>
			</div>
		</div>
	<?php $i++; endforeach;?>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-with-popup" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-with-popup" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>

</div>

<style>
/* Carousel height */
#carousel-with-popup .carousel-inner .item,
#carousel-with-popup .carousel-inner .carousel-image{
	height: <?php _e($height);?>;
}
/* Carousel height */

/* Carousel overlay */
#carousel-with-popup .carousel-overlay{
  background-color: rgba(0,0,0,<?php _e($overlay)?>);
}
/* Carousel overlay */
</style>
