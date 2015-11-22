var canvas  = document.querySelector('.canvas'),
	context = canvas.getContext('2d');

context.beginPath();

context.moveTo(50,50);
context.lineTo(200,200);
context.lineTo(50,200);
// context.closePath();

context.lineWidth   = 20;
context.lineCap     = 'square';
context.lineJoin    = 'bevel';
context.strokeStyle = 'rgba(255,0,0,0.1)';

context.stroke();
// context.fill();