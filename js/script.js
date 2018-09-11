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
			return $( hash );
		};
		
		
		$el.on( 'click', function( event ) {
			event.preventDefault();
			if( $el.isTargetValid() ){
				
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


/****Header3 Scroll ToggleClass****/
$(window).scroll(function(){
	$('.header3 nav').toggleClass('scrolled', $(this).scrollTop() > 5);
});


/***Bootstrap Navigation Active Class Toggle***/
$( '.navbar-nav a' ).on( 'click', function () {
	$( '.navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});