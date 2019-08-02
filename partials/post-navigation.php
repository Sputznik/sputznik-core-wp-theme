<div class="entry-post-nav">
  <?php the_post_navigation(
    array(
      'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
        '<span class="post-title">%title</span>',
      'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
        '<span class="post-title">%title</span>',
    )
  ); ?>
</div>
