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
<style>
 .single-template-2{
   padding: 0;
 }
.single-template-2  .header_img{
  position: relative;
  width: 100%;
  height: 300px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
 }
 .single-template-2 .overlay{
   width: 100%;
   height: 100%;
   position: absolute;
   top: 0;
   left: 0;
   background-color: rgba( 0,0,0,0.4 );
 }
 .single-template-2 .post-title-section{
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate( -50%,-50% );
   width: 100%;
 }
 .single-template-2 .post-title-section > h1{
   margin: 0;
   color: #fff;
   line-height: 1.375em;
   text-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
 }
 .single-template-2 .author-info{
   color: #fff !important;
 }
 .single-template-2 .post-content > .post-tags{
   margin-top: 25px;
 }
 .single-template-2 .post-content > .post-tags >  a{
   display: inline-block;
   padding: 16px 32px;
   margin-right: 8px;
   margin-bottom: 10px;
   background: #000;
   color: #fff;
   border-radius: 4px 4px 4px 4px;
   text-decoration: none;
 }


.single-template-2 .post-content > .post-tags >  a:before {
   font-family: "FontAwesome";
   content: "\f02c";
   display: inline-block;
   padding-right: 10px;
   vertical-align: middle;
   font-weight: 900;
}

.single-template-2 .comment-reply-title{
  padding-top: 0;
  border: none;
}

@media( max-width: 767px ){
  .single-template-2 .post-content, .single-template-2 .space{
    padding: 20px 15px;
  }
  .single-template-2 .narrow-col{
    margin-top: 20px;
    margin-bottom: 10px;
  }
  .single-template-2 .space{
    padding-top: 5px;
  }
  .single-template-2 .entry-comments{
    margin-top: 10px;
  }
}
 /* @media( min-width: 769px ){
   .single-template-2 .post-content{
     width: 960px;
      margin: 0 auto;
   }
 } */
 @media( min-width: 1025px ){
   .single-template-2 .post-content{
     width: 1000px;
      margin: 20 auto;
   }
 }
</style>
