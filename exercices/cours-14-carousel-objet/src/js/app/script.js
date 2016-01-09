var $carousels = $( '.carousel' );

$carousels.each( function()
{
	var $carousel = $( this ),
		carousel  = new Carousel( $carousel );
} );