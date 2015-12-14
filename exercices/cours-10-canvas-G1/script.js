var canvas  = document.querySelector('.canvas'),
	context = canvas.getContext('2d');

// context.beginPath();

// /**
//  * LINES
//  */
// // context.moveTo(50,50);
// // context.lineTo(200,200);
// // context.lineTo(50,200);
// // context.closePath();

// /**
//  * STYLE
//  */
// context.lineWidth   = 10;
// context.lineCap     = 'square';
// context.lineJoin    = 'bevel';
// context.strokeStyle = 'red';

// context.fillStyle = 'orange';

// context.shadowColor   = 'rgba(0,0,0,0.2)';
// context.shadowBlur    = 5;
// context.shadowOffsetX = 2;
// context.shadowOffsetY = 6;

// /**
//  * DRAW / ARC
//  */
// context.rect( 50, 50, 200, 100 );

// context.stroke();

// context.beginPath();
// context.moveTo( 100, 200 );
// context.arc( 100, 200, 100, 0, Math.PI * 0.8, true );

// context.fill();

// /**
//  * FILLRECT / CLEARRECT
//  */
// context.fillRect( 300, 50, 100, 200 );

// context.clearRect( 100, 100, 250, 50 );

// /**
//  * TEXT
//  */
// var text = 'Salut tout le monde';

// context.font         = '40px Arial';
// context.textAlign    = 'center';
// context.textBaseline = 'top';

// // console.log( context.measureText( text ).width );

// context.fillStyle = 'blue';
// context.fillText( text, 300, 100 );

// context.lineWidth   = 2;
// context.strokeText( text, 300, 200 );

// /**
//  * IMAGE
//  */
// var image = new Image();

// image.onload = function()
// {
// 	context.drawImage( image, 50, 350, image.width / 2, image.height / 2 );
// };

// image.src = 'https://unsplash.it/300/200/?random';

// /**
//  * GRADIENT
//  */
// var gradient = context.createLinearGradient( 350, 350, 650, 550 );
// gradient.addColorStop( 0, 'red' );
// gradient.addColorStop( 0.5, 'orange' );
// gradient.addColorStop( 1, 'white' );

// context.fillStyle = gradient;

// context.fillRect( 350, 350, 300, 200 );


// gradient = context.createRadialGradient( 610, 50, 100, 500, 50, 200 );
// gradient.addColorStop( 0, 'red' );
// gradient.addColorStop( 0.5, 'orange' );
// gradient.addColorStop( 1, 'white' );

// context.fillStyle = gradient;

// context.fillRect( 500, 50, 300, 200 );

// /**
//  * CURVES
//  */
// context.beginPath();
// context.moveTo( 50, 50 );
// context.bezierCurveTo( 300, 100, 100, 300, 300, 300 );
// context.stroke();

// context.beginPath();
// context.moveTo( 50, 50 );
// context.quadraticCurveTo( 300, 100, 300, 300 );
// context.stroke();

// /**
//  * GLOBAL COMPOSITE OPERATION
//  */
// context.globalCompositeOperation = 'lighter';
// context.fillStyle = '#ff0000';
// context.fillRect( 650, 250, 100, 100 );

// context.fillStyle = '#00ff00';
// context.fillRect( 670, 270, 100, 100 );

// context.fillStyle = '#0000ff';
// context.fillRect( 690, 290, 100, 100 );

/**
 * EXERCICE
 */
var x     = 400,
	speed = 10;

function loop()
{
	window.requestAnimationFrame( loop );

	context.clearRect( 0, 0, 800, 600 );

	context.beginPath();
	context.arc( x, 200, 50, 0, Math.PI * 2 );
	context.fill();

	x += speed;

	if( x > 750 || x < 50 )
		speed *= -1;
}
loop();