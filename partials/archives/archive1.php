<div class="container">
  <div class="row">
    <div class='col-sm-12'>
      <h2 style="text-transform: capitalize;">
        <?php _e( $term->name );?>
      </h2>
      <br>
      <?php if (have_posts()) : ?>
      <ul class='orbit-three-grid' style='margin-bottom:50px; padding-left: 0;'>
        <?php while (have_posts()) : the_post(); ?>
        <li class="orbit-article-db orbit-list-db">
          <?php get_template_part('partials/post', 'common');?>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
