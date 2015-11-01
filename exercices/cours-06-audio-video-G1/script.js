var player = {};

player.container   = document.querySelector('.player');
player.video       = player.container.querySelector('video');
player.volume_down = player.container.querySelector('.volume-down');
player.volume_up   = player.container.querySelector('.volume-up');

player.volume_down.addEventListener('click',function(){
	console.log('volume down');
	player.video.volume -= 0.1;
});

player.volume_up.addEventListener('click',function(){
	console.log('volume up');
	player.video.volume += 0.1;
});

player.video.controls = true;
player.video.play();