<article class="single-post single-template2">
  <div class='single-featured-image'>
    <?php the_post_thumbnail('medium_large');?>
  </div>
  <!-- <div class='post-content'>
    <h1 class="post-title text-left"><?php //the_title(); ?></h1>
    <div class='author-info text-muted'>By <?php //the_author();?> on <?php //the_date();?></div>
    <?php //the_content(); ?>
    <div class="post-nav">
      <span class="pull-left"><?php //previous_post_link("%link", "&laquo; Previous"); ?></span>
      <span class="pull-right"><?php //next_post_link("%link", "Next &raquo;"); ?></span>
    </div>
  </div> -->
  <!-- <div class="entry-comments"> -->
  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) {
    //   comments_template();
    // }
  ?>
  <!-- </div> -->
  <!-- <div class="entry-post-nav"> -->
    <?php //the_post_navigation(
      // array(
        // 'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
          // '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
          // '<span class="post-title">%title</span>',
        // 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
          // '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
          // '<span class="post-title">%title</span>',
      // )
    // ); ?>
  <!-- </div> -->
</article>
<style>
  .single-template2 > .single-featured-image{
    float: none ;
    margin-left: 0;
    height: 270px;
  }
  .single-template2 > .single-featured-image img{
    height: 100%;
    max-width: 100%;
  }
</style>
