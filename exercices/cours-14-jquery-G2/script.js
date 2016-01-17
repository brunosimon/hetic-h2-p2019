var bar = $( 'a' );

bar.on( 'click', function( e )
{
	$.ajax( {
		url : 'toto.html',
		success : function( data )
		{
			var $data = $( data );
			console.log($data);
			$( 'body' ).append( $data );
		},
		error : function()
		{
			console.log('error');
		}
	} );

	return false;
} );