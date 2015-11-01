var player = {};

player.container   = document.querySelector('.player');
player.video       = player.container.querySelector('video');
player.volume_down = player.container.querySelector('.volume-down');
player.volume_up   = player.container.querySelector('.volume-up');

player.volume_down.addEventListener('click',function(){
	player.video.volume -= 0.1;
});

player.volume_up.addEventListener('click',function(){
	player.video.volume += 0.1;
});































// // Méthodes
// player.video.play();
// player.video.pause();

// // Propriétés
// console.log(player.video.volume);
// player.video.volume = 0.5;

// // Événements
// player.video.addEventListener('play',function(){
// 	console.log('play !');
// });