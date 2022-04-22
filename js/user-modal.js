jQuery.fn.sp_user_popup = function() {

	return this.each(function() {

		var $el           = jQuery(this),
        $image         = $el.find('.user-thumbnail-bg'),
				imageUrl			=	$image.attr('style'),
        name          = $el.find('.name').text(),
        designation   = $el.find('.designation').text(),
        description   = $el.find('.description').html();

    // CREATES DYNAMIC USER MODAL
		$el.on( 'click', function() { $el.createModal(); });

    // SP USER MODAL LAYOUT
    $el.createModal = function() {

      html = `
      <div class="modal fade" id="sp-user-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a id="close" data-toggle="modal" data-target="#sp-user-modal" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
              <div class="sp-user-body">
                <div class="user-thumbnail-bg" style="${imageUrl}"></div>
                <div class="user-meta">
                  <h5 class="name">${name}</h5>
                  <span class="designation">${designation}</span>
                  <div class="separator"></div>
                  <div class="description">${description}</div>
                </div>
              </div>
            </div><!-- Modal Body -->
          </div><!-- Modal Content -->
        </div><!-- Modal Dialog -->
      </div>
      `;

      jQuery("body").append(html);
			jQuery('#sp-user-modal').modal('show');
    }

    // REMOVES MODAL FROM THE DOM
    jQuery(document).on('hidden.bs.modal', function () {
			jQuery('#sp-user-modal').remove();
      jQuery('.modal-backdrop.in').remove();
		});


	}); //End each()

};

jQuery(document).ready(function () {

	jQuery('a[data-behaviour~=sp-grid-user-popup]').sp_user_popup();

});
