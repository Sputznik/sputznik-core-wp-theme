

<?php do_action('loadS');?>
<section class="header4">
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php do_action( 'sp_logo' );?>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <?php
        add_filter( 'sp_nav_menu_options', function( $args ){
          $args['container_class'] = 'collapse navbar-collapse';
          $args['container_id'] = 'bs-example-navbar-collapse-1';
          $args['menu_class'] = 'nav navbar-nav navbar-right';
          return $args;
        });

        do_action('sp_nav_menu');
      ?>

    </div><!-- /.container-fluid -->
  </nav>
</section>
