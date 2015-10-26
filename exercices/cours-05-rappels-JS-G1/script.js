var foo = document.querySelector('.foo');

var mon_interval = window.setInterval(function(){
	console.log('Ding !');
},50);

foo.onmouseenter = function()
{
	window.clearInterval(mon_interval);
};

foo.onmouseleave = function()
{
	mon_interval = window.setInterval(function(){
		console.log('Ding !');
	},50);
};