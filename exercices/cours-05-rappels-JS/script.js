var foo   = document.querySelector('.foo'),
	bar   = document.querySelector('.bar'),
	lorem = document.querySelector('.lorem'),
	ipsum = document.querySelector('.ipsum');

foo.onclick = function()
{
	console.log('click !');
};

foo.onmouseover = function()
{
	console.log('Mouse over !');
};