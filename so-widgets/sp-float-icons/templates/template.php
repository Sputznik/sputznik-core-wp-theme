<?php global $sp_theme;?>
<div class="sp-floating-icons">
	<ul class="list-unstyled">
		<?php foreach( $instance['icons'] as $icon ):?>
		<li style=" width: <?php _e( 100/count($instance['icons']) );?>%">
			<?php
				$icon_link = $icon['is_modal'] ? '#icon-modal'.$sp_theme->getUniqueID( $icon ) : $icon['link'];
			?>
			<a <?php if( $icon['is_modal'] ):?>data-toggle="modal"<?php endif;?> href="<?php _e( $icon_link );?>" style="<?php if( isset( $icon['icon_color'] ) && $icon['icon_color'] ):?>background-color: <?php _e( $icon['icon_color'] );?><?php endif;?>">
				<?php echo siteorigin_widget_get_icon( $icon['icon'], array() ); ?>
			</a>
		</li>
		<?php endforeach;?>
	</ul>
</div>

<!-- MODALS FROM THE ICONS -->
<?php foreach( $instance['icons'] as $icon ): if( $icon['is_modal'] && function_exists( 'siteorigin_panels_render' ) ): $icon_id = $sp_theme->getUniqueID( $icon ); ?>
	<div id="<?php _e( 'icon-modal'.$icon_id );?>" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!--button type="button" class="close">&times;</button-->
				<div class="modal-body">
					<?php echo siteorigin_panels_render( 'w'.$icon_id, true, $icon['modal_builder'] );?>
				</div>
			</div>
		</div>
	</div>		
<?php endif; endforeach;?>
<!-- END OF MODALS ICONS -->