<?php $term = $wp_query->get_queried_object();?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class='col-sm-12'>
      <h1 class="text-center" style="text-transform: capitalize;">
        <?php _e( $term->name );?>
      </h1>
      <br>
      <?php if (have_posts()) : ?>
      <ul class="row-list" style='margin-bottom:50px; padding-left: 0;'>
        <?php while (have_posts()) : the_post(); ?>
        <li class="orbit-article-db orbit-list-db">
          <div class="col-md-4" style="padding-top:20px;">
            <?php
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );

            $img_class = "orbit-thumbnail-bg";

            if( !has_post_thumbnail() || !is_array( $thumbnail ) || !$thumbnail[0] ){
              $img_class .= " no-thumbnail";
            }
            ?>
            <div class='<?php _e( $img_class );?>' style='background-image: url( "<?php _e( $thumbnail[0] );?> ");position: relative;'>
            	<a href='<?php the_permalink();?>' style="position: absolute; top:0;left:0;width:100%;height: 100%;"></a>
            </div>
          </div>
          <div class="col-md-8 orbit-content">
            <h3 class='orbit-title'><a href='<?php the_permalink();?>'><?php the_title();?></a></h3>

          	<p>By <?php the_author();?> on <?php the_time( 'F jS Y' );?></p>
          	<div class='orbit-excerpt'><?php the_excerpt();?></div>
            <a class='orbit-btn' href='<?php the_permalink();?>'>Read More</a>
          </div>

        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
