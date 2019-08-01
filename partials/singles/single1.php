<div id="content" class="container single-template-1">
	<div class="row">
		<div class="col-md-12">
      <?php if(have_posts()): while ( have_posts() ): the_post();?>
      <article class="single-post">
        <div class='single-featured-image'>
          <?php the_post_thumbnail('medium_large');?>
        </div>
        <div class='post-content'>
          <h1 class="post-title text-left"><?php the_title(); ?></h1>
          <div class='author-info text-muted'>By <?php the_author();?> on <?php the_date();?></div>
          <?php the_content(); ?>
          <div class="post-nav">
            <span class="pull-left"><?php previous_post_link("%link", "&laquo; Previous"); ?></span>
            <span class="pull-right"><?php next_post_link("%link", "Next &raquo;"); ?></span>
          </div>
        </div>
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
      </article>
      <?php endwhile;endif;?>
    </div>
  </div>
</div>
<style>
	article.single-post{ margin-bottom: 100px; }
	article.single-post .post-nav{ display: none; }
	#content{ margin-top: 100px !important; }
	@media( min-width:769px ){
		.single-featured-image{
			float: right;
			margin-left: 20px;
		}
	}
	.single-featured-image{ margin-bottom: 20px;}
	.single-featured-image img{
		max-width: 600px;
		height: auto;
		width: 100%;
	}

	.author-info{ margin-bottom: 20px;}
</style>
