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
        <div class='author-info text-center'>By <?php the_author();?> &nbsp;|&nbsp; <?php the_date();?></div>
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
      <?php get_template_part( 'partials/comments', 'box');?>
      <?php get_template_part( 'partials/post', 'navigation');?>
    </div>
  </article>
<?php endwhile;endif;?>
</div>
