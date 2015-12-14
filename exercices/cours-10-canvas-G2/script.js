/**
 * SET UP
 */
var canvas  = document.querySelector('.canvas'),
	context = canvas.getContext('2d');

// /**
//  * LINES
//  */
// context.beginPath();

// context.moveTo(50,50);
// context.lineTo(200,200);
// context.lineTo(50,200);
// // context.closePath();

// /**
//  * STYLE
//  */
// context.lineWidth   = 2;
// context.lineCap     = 'square';
// context.lineJoin    = 'mitter';
// context.strokeStyle = 'rgba(255,0,0,1)';

// context.fillStyle = '#ff0000';

// /**
//  * SHADOW
//  * @type {String}
//  */
// context.shadowColor   = 'rgba(0,0,0,0.4)';
// context.shadowBlur    = 10;
// context.shadowOffsetX = 4;
// context.shadowOffsetY = 8;

// context.stroke();
// // context.fill();

// /**
//  * RECT / ARC
//  */
// context.rect( 50, 250, 200, 100 );

// context.stroke();
// // context.fill();

// context.beginPath();
// context.moveTo( 400, 250 );
// context.arc( 400, 250, 50, 0, - Math.PI * 1.5, true );
// context.closePath();

// context.stroke();
// // context.fill();

// /**
//  * FILLRECT / CLEARRECT
//  */
// context.fillRect( 150, 50, 200, 100 );
// context.clearRect( 300, 100, 100, 40 );

// /**
//  * TEXT
//  */
// var text = 'Bonjour tout le monde';

// context.font         = '40px Arial';
// context.textAlign    = 'center';
// context.textBaseline = 'top';

// context.fillText( text, 500, 50 );
// context.strokeText( text, 500, 100 );

// /**
//  * IMAGE
//  */
// var image = new Image();

// image.onload = function()
// {
// 	context.drawImage( image, 50, 380, image.width / 2, image.height / 2 );
// };

// image.src = 'https://unsplash.it/300/200/?random';

// /**
//  * GRADIENT
//  */
// var linear_gradient = context.createLinearGradient( 500, 200, 700, 300 );
// linear_gradient.addColorStop( 0, 'red' );
// linear_gradient.addColorStop( 0.5, 'orange' );
// linear_gradient.addColorStop( 1, 'white' );

// context.fillStyle = linear_gradient;
// context.fillRect( 500, 200, 200, 100 );

// var radial_gradient = context.createRadialGradient( 599, 350, 0, 500, 350, 100 );
// radial_gradient.addColorStop( 0, '#3D124A' );
// radial_gradient.addColorStop( 1, '#ffffff' );

// context.fillStyle = radial_gradient;
// context.fillRect( 500, 350, 200, 100 );

// /**
//  * COURBES
//  */
// context.beginPath();
// context.moveTo( 50, 100 );
// context.bezierCurveTo( 300, 100, 100, 300, 300, 300 );
// context.stroke();

// context.beginPath();
// context.moveTo( 50, 100 );
// context.quadraticCurveTo( 300, 100, 300, 300 );
// context.stroke();

// /**
//  * GLOBAL COMPOSITE OPERATION
//  */
// context.globalCompositeOperation = 'lighter';
// context.fillStyle = '#ff0000';
// context.fillRect( 300, 350, 100, 100 );

// context.fillStyle = '#00ff00';
// context.fillRect( 320, 370, 100, 100 );

// context.fillStyle = '#0000ff';
// context.fillRect( 340, 390, 100, 100 );

/**
 * LOOP
 */
var x     = 100,
	speed = 10;

function loop()
{
	window.requestAnimationFrame( loop );

	context.clearRect( 0, 0, canvas.width, canvas.height );

	context.beginPath();
	context.arc( x, 200, 50, 0, Math.PI * 2 );
	context.fill();

	if( x > canvas.width - 50 || x < 50 )
		speed *= -1;

	x += speed;
}
loop();