jQuery( document ).ready( function( $ ) {

    // Book
	
    if( $('body').hasClass('post-type-book') ){
		// Hide others divs
		$('#submitdiv').hide();
		$('#postdivrich').hide();

		$('#save_adittional_info_button').click(function(e) {  
			e.preventDefault();
			$('#publish').click();
		});

	}


});