<?php get_header();?>
<?php global $post;?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()):while ( have_posts() ) : the_post();?>
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
			<?php if( is_active_sidebar( 'single-post-footer' ) ){ dynamic_sidebar( 'single-post-footer' ); }?>
		</div>
</div>

</div>
<?php get_footer();?>
<style>
	article.single-post{
		margin-bottom: 100px;
	}
	article.single-post .post-nav{
		display: none;
	}
	#content{
		margin-top: 100px !important;
	}
	@media( min-width:769px ){
		.single-featured-image{
			float: right;
			margin-left: 20px;
		}
	}
	.single-featured-image{
		margin-bottom: 20px;
	}
	.single-featured-image img{
		max-width: 600px;
		height: auto;
		width: 100%;
	}

	.author-info{
		margin-bottom: 20px;
	}

	/*NEXT AND PREVIOUS NAV*/

	.screen-reader-text{
	  clip: rect(1px,1px,1px,1px);
	  height: 1px;
	  overflow: hidden;
	  position: absolute !important;
	  width: 1px;
	  word-wrap: normal !important;
	}


	.post-navigation{
	  border-top: 4px solid #1a1a1a;
	  border-bottom: 4px solid #1a1a1a;
	  clear: both;
	  margin: 0 0 3.5em;
	}
	.post-navigation a[href]{
	  text-decoration: none;
	}
	.post-navigation div+div{
	  border-top: 4px solid #1a1a1a;
	}
	.post-navigation .meta-nav{
	  color: #686868;
	  font-size: 14px;
	  text-transform: uppercase;
	  margin-top: 20px;
	  display: block;
	}
	.post-navigation .post-title{
	  font-size: 34px;
	  display: block;
	  margin-bottom: 20px;
	  text-rendering: optimizeLegibility;
	}


	/* COMMENTS */
	.entry-comments, .entry-post-nav{
		max-width: 600px;
		margin: 50px auto;
	}
	
	.commentlist{
	  list-style: none;
	  padding-left: 0;
	  margin-bottom: 30px;
	}
	.commentlist .comment{
	  margin-bottom: 30px;
	  margin-top: 30px;
	}

	.commentlist > .comment > .comment-body{
		margin-bottom: 80px;
	}

	.commentlist .comment .reply a[href]{
	  border: #007acc solid 1px;
	  border-radius: 2px;
	  color: #007acc;
	  padding: 5px 15px;
	}
	.commentlist p{
	  margin-bottom: 25px;
	}
	.comment-meta{
	  font-size: 85%;
	  color: #777;
	  margin-top: 20px;
	  margin-bottom: 10px;
	}
	#comments, .comment-reply-title{
	  /* border-top: 4px solid #1a1a1a; */
	  padding-top: 30px;
	  font-weight: bold;
	}
	.comment-notes, .comment-awaiting-moderation, .logged-in-as, .form-allowed-tags{
	  font-size: 14px;
	  color: #777;
	  margin-bottom: 20px;
	}

	.comment-form{
	  padding-top: 20px;
	  max-width: 600px;
	}

	.comment-form label{
	  display: block;
	  color: #777;
	  text-transform: uppercase;
	}

	.comment-form p{
	  margin-bottom: 30px;
	}

	.comment-form .comment-form-cookies-consent{
	  display: none;
	}

	.comment-form textarea{
	  width: 100%;
	  padding: 30px 20px;
	}

	.comment-form input[type=text]{
	  width: 100%;
	}

	.comment-form input[type=submit]{
	  background: #1a1a1a;
	  border: 0;
	  border-radius: 2px;
	  color: #fff;
	  text-transform: uppercase;
	  padding: 10px 15px;

	}
</style>
