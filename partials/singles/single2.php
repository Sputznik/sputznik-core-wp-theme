<div id="content" class="container-fluid single-template-2">
  <?php if(have_posts()): while ( have_posts() ): the_post();?>
  <article class="single-post">
    <?php if( has_post_thumbnail() ):?>
      <div class="header_img" style="background:url( <?php _e( get_the_post_thumbnail_url() );?> );">
    <?php else:?>
      <div class="header_no_img" style="display: none;">
    <?php endif;?>
      <div class="overlay"></div>
      <div class="post-title">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <div class='author-info text-center'>By <?php the_author();?> on <?php the_date();?></div>
      </div>
    </div>
    <div class="post-content">
      <?php the_content(); ?>
      <div class="post-tags">
        <?php the_tags( '', '', '' ); ?>
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
 .single-template-2 .post-title{
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate( -50%,-50% );
   width: 100%;
 }
 .single-template-2 .post-title > h1{
   margin: 0;
   color: #fff;
   line-height: 1.375em;
   text-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
 }
 .single-template-2 .post-title .author-info{
   color: #fff;
 }
 .single-template-2 .post-content{
   padding: 20px 15px;
 }
 .single-template-2 .post-content > .post-tags{
   margin-top: 25px;
 }
 .single-template-2 .post-content > .post-tags >  a{
   display: inline-block;
   padding: 16px 32px;
   margin-right: 8px;
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


 /* .single-template-2 .post-content > .post-tags >  a::before {
   display: inline-block;
   font-style: normal;
   font-variant: normal;
   text-rendering: auto;
   -webkit-font-smoothing: antialiased;
 } */

 /* Step 2: Reference Individual Icons */
 /* .single-template-2 .post-content > .post-tags >  a::before {
   font-family: "Font Awesome 5 Free";
   font-weight: 900;
   content: "\f007";
 } */



 @media( min-width: 769px ){
   .single-template-2 .post-content{
     width: 960px;
      margin: 0 auto;
   }
 }
 @media( min-width: 1025px ){
   .single-template-2 .post-content{
     width: 1000px;
      margin: 0 auto;
   }
 }
</style>
