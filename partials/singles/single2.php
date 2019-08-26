<div id="content" class="container-fluid single-template-2">
  <?php if(have_posts()): while ( have_posts() ): the_post();?>
  <article class="single-post">
    <?php if( has_post_thumbnail() ):?>
      <div class="header_img" style="background-image:url( <?php _e( get_the_post_thumbnail_url() );?> );">
    <?php else:?>
      <div class="header_no_img" style="display: none;">
    <?php endif;?>
      <div class="overlay"></div>
      <div class="post-title-section">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <div class='author-info text-center'>By <?php the_author();?> on <?php the_date();?></div>
      </div>
    </div>
    <div class="post-content narrow-col">
      <?php the_content(); ?>
      <div class="post-tags">
        <h4>Tagged Under: </h4>
        <?php the_tags( '', '', '' ); ?>
      </div>
    </div>
    <div class="space">
      <div class="entry-comments">
      <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }
      ?>
      </div>
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
    </div>
  </article>
<?php endwhile;endif;?>
</div>
