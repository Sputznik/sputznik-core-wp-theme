<div class="container single-template-3">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post;?>
      <article <?php post_class();?>>
        <header class="entry-header"><h1 class="entry-title"><?php the_title();?></h1></header>
        <div class="entry-summary"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>
        <div class="post-thumbnail"><?php _e( do_shortcode( '[orbit_thumbnail size="full"]' ) );?></div>
        <div class="entry-content"><?php the_content(); ?></div>
        <?php get_template_part( 'partials/author', 'box');?>
        <?php get_template_part( 'partials/comments', 'box');?>
        <?php get_template_part( 'partials/post', 'navigation');?>
      </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<style>
.single-template-3 article{ max-width: 700px; margin: 100px auto;}

.single-template-3 .entry-header h1{
  font-size: 48px;
  font-weight: bold;
}
.single-template-3 .entry-summary{
  font-size:  30px;
  line-height: 1;
  margin-bottom: 50px;
  color: #777;
}
.single-template-3 .post-thumbnail{
  margin-bottom: 40px;
}
.single-template-3 .entry-content p{
  margin-bottom: 25px;
}


.single-template-3 article .entry-content h3{
  margin-top: 40px;
  margin-bottom: 40px;
}

.single-template-3 article img{
  max-width: 100%;
  height: auto;
}

.single-template-3 article .entry-content h4{
  font-size: 28px;
  text-transform: uppercase;
  font-weight: bold;
}

.single-template-3 .entry-author{
  border: none;
  padding: 20px 0;
  border-radius: 0;
  border-top: #1a1a1a solid 4px;
  margin-top: 100px;
}

.single-template-3 .entry-author h1{
  text-transform: capitalize;
  border-bottom: 0;
  padding-bottom: 0;
  margin-bottom: 40px;
  margin-top: 0;
}

.single-template-3 .entry-author .author-info h3{ margin-bottom: 15px;}

.single-template-3 .entry-author h1{
  text-transform: uppercase;
  margin-bottom: 40px;
}

.single-template-3 .entry-author .author-info h3{ margin-top: 0;}
.single-template-3 .entry-comments,.single-template-3 .entry-post-nav{
  max-width: none;
}

.single-template-3 .entry-comments{
  margin-top: 60px;
  margin-bottom: 100px;
}
</style>
