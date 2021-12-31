( function( $ ) {
	wp.customize( 'discovery_url_instagram', function( value ) {
		console.log("changed1")
		value.bind( function( to ) {
			console.log("changed2")
		} );
	} );

} )( jQuery );