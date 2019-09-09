<?php

  $icons = array(
    'fb'  => array(
      'icon' => 'fa fa-facebook',
      'link' => 'https://www.facebook.com/sharer.php?u=' . get_the_permalink()
    ),
    'tw'  => array(
      'icon' => 'fa fa-twitter',
      'link' => 'https://twitter.com/intent/tweet?url=' . get_the_permalink()
    ),
    'linkedin'  => array(
      'icon' => 'fa fa-linkedin',
      'link' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . get_the_permalink()
    ),
    'mail'  => array(
      'icon' => 'fa fa-envelope',
      'link' => 'mailto:?subject=' . get_the_title()
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
