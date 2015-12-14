/**
 * SET UP
 */
var canvas  = document.querySelector('.canvas'),
	context = canvas.getContext('2d');

/**
 * MOUSE
 */
var mouse = { x : 200, y : 200 };
canvas.addEventListener( 'mousemove', function( e )
{
	mouse.x = e.clientX;
	mouse.y = e.clientY;
} );

/**
 * PARTICLES
 */
var particles = [];

function create_particle()
{
	var particle = {};
	particle.x       = mouse.x;
	particle.y       = mouse.y;
	particle.speed   = {};
	particle.speed.x = Math.random() * 10 - 5;
	particle.speed.y = Math.random() * 10 - 5;
	particle.style   = 'hsl(' + ( Math.random() * 360 ) + ',100%,50%)';
	particle.radius  = Math.random() * 20;

	particles.push( particle );
}

/**
 * DRAW
 */
function draw()
{
	context.clearRect( 0, 0, canvas.width, canvas.height );
	for( var i = 0; i < particles.length; i++ )
	{
		var particle = particles[ i ];

		particle.x += particle.speed.x;
		particle.y += particle.speed.y;

		context.beginPath();
		context.arc( particle.x, particle.y, particle.radius, 0, Math.PI * 2 );
		context.fillStyle = particle.style;
		context.fill();
	}
}

/**
 * LOOP
 */
function loop()
{
	window.requestAnimationFrame( loop );

	create_particle();
	draw();
}
loop();