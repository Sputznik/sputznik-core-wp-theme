<?php

  $icons = array(
    'fb'  => array(
      'icon' => 'fa fa-facebook',
      'link' => ''
    ),
    'tw'  => array(
      'icon' => 'fa fa-twitter',
      'link' => ''
    ),
    'gplus'  => array(
      'icon' => 'fa fa-google-plus',
      'link' => ''
    ),
    'linkedin'  => array(
      'icon' => 'fa fa-linkedin',
      'link' => ''
    ),
  );
?>
<?php if( count( $icons ) ):?>
<ul class="list-inline text-center">
	<?php foreach( $icons as $slug => $icon ):?>
	<li><a href="<?php _e( $icon[ 'link' ] );?>" target="_blank"><i class="<?php _e( $icon['icon'] );?>"></i></a></li>
	<?php endforeach;?>
</ul>
<?php endif;?>
