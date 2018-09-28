$.fn.smooth_scroll = function( options ) {

	return this.each(function() {
		   
		var $el = $(this);
		
		// CHECK IF TARGET EXISTS WITHIN THE BODY
		$el.isTargetValid = function(){
			
			var $target = $el.getTarget();
			
			if( $target.length ) {
				return true;
			}
			
			return false;
			
		};
		
		// PARSE URL - HELPER FUNCTION
		$el.parseURL = function( url ){
			var a = document.createElement('a');
			a.href = url;
			return a;
		};
		
		// RETURN TARGET ELEMENT
		$el.getTarget = function(){
			var hash = $el.parseURL( $el.attr( 'href' ) ).hash;
			return $('body').find( hash );
		};
		
		
		$el.on( 'click', function( event ) {
			
			if( $el.isTargetValid() ){
				event.preventDefault();
				$('.modal').modal('hide');
				
				$('html, body').stop().animate({
					scrollTop: $el.getTarget().offset().top
				}, 1000);
				
			}
			
		});
			
	});
};




$(document).ready(function () {
	
	$('a[href]').smooth_scroll();
	
	
});


/****Header3 Scroll Toggle****/
$(window).scroll(function(){
	$('.header3 nav').toggleClass('scrolled', $(this).scrollTop() > 5);
});

$(document).ready(function(){
	
	//Bootstrap Navigation Active ToggleClass
	$( '.navbar-nav a' ).on( 'click', function (event) {
		
		$( '.navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
		$( this ).parent( 'li' ).addClass( 'active' );

	});	


});
