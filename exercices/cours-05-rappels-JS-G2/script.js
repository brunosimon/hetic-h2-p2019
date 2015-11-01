var foo = document.querySelector('.foo'),
	bar = document.querySelector('.bar');

// foo.setAttribute('test','toto');
// console.log(foo.getAttribute('class'));
// foo.removeAttribute('test');

// var my_width = 400;

// foo.style.width              = my_width + 'px';
// foo.style.backgroundColor    = 'red';
// foo.style.webkitBorderRadius = '20px';
// foo.style.mozBorderRadius    = '20px';
// foo.style.borderRadius       = '20px';

// console.log(foo.classList);
// foo.classList.add('toto','tata','tutu');
// foo.classList.remove('toto');
// console.log(foo.classList.contains('toto'));

// foo.innerText = '<strong>Salut</strong>';
// console.log(foo.innerText);

// foo.innerHTML = '<strong>Salut</strong>';
// console.log(foo.innerHTML);

// foo.remove();

// foo.appendChild(bar);

// var toto = document.createElement('div');
// toto.classList.add('toto');
// toto.innerText = 'Salut c\'est toto';
// foo.appendChild(toto);

// foo.addEventListener('click',function(){
// 	console.log('click 1');
// });

// foo.addEventListener('click',function(){
// 	console.log('click 2');
// });


// window.setTimeout(function(){
// 	console.log('Cacher prehome');
// },3000);

var my_interval = window.setInterval(function(){
	console.log('tick');
},100);

foo.addEventListener('mouseenter',function(){
	window.clearInterval(my_interval);
});

foo.addEventListener('mouseleave',function(){
	my_interval = window.setInterval(function(){
		console.log('tick');
	},100);
});