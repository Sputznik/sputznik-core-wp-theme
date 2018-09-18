<?php 
  
  $nav_transparent = sp_is_sticky_nav_transparent();
  $bg_class = (! $nav_transparent ) ? 'sticky-solid' : '';
  
?>

<div class="header3">
  <nav class=" navbar navbar-default <?php _e($bg_class);?> " data-spy="affix">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <?php do_action('sp_logo');?>
      </div>
      <?php do_action('sp_nav_menu');?>
    </div>
  </nav>
</div>