var $container   = $( '.container' ),
	$google_link = $( 'a' );

$google_link.on( 'click', function( e )
{
	$.ajax( {
		url : 'toto.html',
		success : function( data )
		{
			var $data = $( data );
			$( 'body' ).append( $data );
		},
		error : function()
		{
			console.log('error');
		}
	} );

	return false;
} );