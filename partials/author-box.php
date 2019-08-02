<div class="entry-author author-box">
  <h1>About the author</h1>
  <div class="author-info">
    <a href="<?php _e( do_shortcode( '[orbit_author_link]' ) );?>"><?php _e( do_shortcode( '[orbit_avatar size=100]' ) );?></a>
    <div class="orbit-author-meta">
      <h3><a href="<?php _e( do_shortcode( '[orbit_author_link]' ) );?>"><?php _e( do_shortcode( '[orbit_author]' ) );?></a></h3>
      <p><?php _e( get_user_meta( $post->post_author, 'description', true ) );?></p>
      <?php
        $user_links = array(
          'user_url'          => '<i class="fa fa-globe"></i>&nbsp;Website',
        );

        _e( "<ul class='list-inline text-muted small'>" );
        foreach ( $user_links as $key => $label ) {
          $link = get_the_author_meta( $key );
          if( $link ){
            _e( "<li><a href='".$link."'>" . $label . "</a></li>" );
          }
        }
        _e( "</ul>" );

      ?>


    </div>
  </div>
</div>
