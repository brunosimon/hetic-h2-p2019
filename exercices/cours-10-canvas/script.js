/**
 * Evolutions
 *  - pooling
 *  - gravity
 *  - boucing
 *  - life
 */

/**
 * CANVAS
 */
var canvas    = document.querySelector( '.canvas' ),
	context   = canvas.getContext( '2d' );

function draw()
{
	context.clearRect( 0, 0, canvas.width, canvas.height );

	for( var i = 0; i < particles.length; i++ )
	{
		var particle = particles[ i ];

		context.beginPath();
		context.arc( particle.x, particle.y, particle.radius, 0, Math.PI * 2 );

		context.fillStyle = particle.style;
		context.fill();
	}
}

/**
 * RESIZE
 */
function resize()
{
	canvas.width  = window.innerWidth;
	canvas.height = window.innerHeight;
}

window.addEventListener( 'resize', resize );
resize();

/**
 * MOUSE
 */
var mouse = { x : 0, y : 0 };

window.addEventListener( 'mousemove', function( e )
{
	mouse.x = e.clientX;
	mouse.y = e.clientY;
} );

/**
 * PARTICLES
 */
var particles = [];

function add_particle()
{
	var particle = {};
	particle.x = mouse.x;
	particle.y = mouse.y;
	particle.velocity = {};
	particle.velocity.x = Math.random() * 10 - 5;
	particle.velocity.y = Math.random() * 10 - 5;
	particle.radius = Math.random() * 10 + 5;

	var hue = 360 * Math.random();
	particle.style = 'hsl(' + hue + ',100%,50%)';

	particles.push( particle );
}

function update_particles()
{
	for( var i = 0; i < particles.length; i++ )
	{
		var particle = particles[ i ];

		particle.x += particle.velocity.x;
		particle.y += particle.velocity.y;
	}
}

/**
 * LOOP
 */
function loop()
{
	window.requestAnimationFrame( loop );

	update_particles();
	add_particle();
	draw();
}

window.requestAnimationFrame( loop );