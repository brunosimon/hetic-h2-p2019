var $calcul = $( '.calcul' ),
	$total  = $( '.total' ),
	$count  = $( '.count' ),
	calculs = [],
	score   = 0;

function update()
{
	$calcul.text( calculs.join( ' + ' ) );

	var total = 0;
	for( var key in calculs )
		total += calculs[ key ];

	$total.text( total );

	$count.text( calculs.length );
}

$(document).on('keydown',function(e)
{
	switch(e.keyCode)
	{
		case 65:
			calculs.push( 0 );
			break;
		case 90:
			calculs.push( 0.25 );
			break;
		case 69:
			calculs.push( 0.50 );
			break;
		case 82:
			calculs.push( 0.75 );
			break;
		case 84:
			calculs.push( 1 );
			break;
		case 32:
			calculs = [];
			break;
	}
	
	update();
});