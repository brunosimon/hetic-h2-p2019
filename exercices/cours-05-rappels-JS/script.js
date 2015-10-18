var foo   = document.querySelector('.foo'),
	bar   = document.querySelector('.bar'),
	lorem = document.querySelector('.lorem'),
	ipsum = document.querySelector('.ipsum');


foo.onclick = function(){
	console.log('click 1');
};
foo.onclick = function(){
	console.log('click 2');
};

foo.addEventListener('click',function(){
	console.log('click 1');
});
foo.addEventListener('click',function(){
	console.log('click 2');
});

// window.onscroll = function(){
//     console.log('scroll 1');
// };
// window.onscroll = function(){
//     console.log('scroll 2');
// };


// window.addEventListener('scroll',function(){
//     console.log('scroll 1');
// });
// window.addEventListener('scroll',function(){
//     console.log('scroll 2');
// });