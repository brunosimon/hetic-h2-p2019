/**
 * SET UP
 */
var player = {};

player.container    = document.querySelector('.player');
player.video        = player.container.querySelector('video');
player.volume_up    = player.container.querySelector('.volume-up');
player.volume_down  = player.container.querySelector('.volume-down');
player.seek_bar     = player.container.querySelector('.seek-bar');
player.progress_bar = player.seek_bar.querySelector('.progress-bar');

/**
 * VOLUME
 */
player.volume_up.addEventListener('click',function(){

	var volume = player.video.volume + 0.1;

	if(volume > 1)
		volume = 1;

	player.video.volume = volume;
});

player.volume_down.addEventListener('click',function(){

	var volume = player.video.volume - 0.1;

	if(volume < 0)
		volume = 0;

	player.video.volume = volume;
});

/**
 * SEEK BAR
 */
window.setInterval(function(){

	var progress_ratio = player.video.currentTime / player.video.duration;
	player.progress_bar.style.webkitTransform = 'scaleX(' + progress_ratio + ')';
	player.progress_bar.style.mozTransform    = 'scaleX(' + progress_ratio + ')';
	player.progress_bar.style.msTransform     = 'scaleX(' + progress_ratio + ')';
	player.progress_bar.style.oTransform      = 'scaleX(' + progress_ratio + ')';
	player.progress_bar.style.transform       = 'scaleX(' + progress_ratio + ')';
},50);

player.seek_bar.addEventListener('click',function(e){
	var bounding_rect = player.seek_bar.getBoundingClientRect(),
		x             = e.clientX - bounding_rect.left,
		ratio         = x / bounding_rect.width,
		time          = ratio * player.video.duration;

	player.video.currentTime = time;
});

/**
 * VIDEO EVENTS
 */
player.video.addEventListener('play',function(){
	player.container.classList.add('playing');
	player.container.classList.remove('paused');
});

player.video.addEventListener('pause',function(){
	player.container.classList.remove('playing');
	player.container.classList.add('paused');
});

/**
 * DEBUG
 */
player.video.controls = true;
player.video.autoplay = true;


// player.container   = document.querySelector('.player');
// player.video       = player.container.querySelector('video');
// player.volume_down = player.container.querySelector('.volume-down');
// player.volume_up   = player.container.querySelector('.volume-up');

// player.volume_down.addEventListener('click',function(){
// 	console.log('volume down');
// 	player.video.volume -= 0.1;
// });

// player.volume_up.addEventListener('click',function(){
// 	console.log('volume up');
// 	player.video.volume += 0.1;
// });

// player.video.controls = true;
// player.video.play();

