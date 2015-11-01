var player = {};

/**
 * SET UP
 */
player.container    = document.querySelector('.player');
player.video        = player.container.querySelector('video');
player.volume_down  = player.container.querySelector('.volume-down');
player.volume_up    = player.container.querySelector('.volume-up');
player.seek_bar     = player.container.querySelector('.seekbar');
player.progress_bar = player.seek_bar.querySelector('.progress');

/**
 * VOLUME
 */
player.volume_down.addEventListener('click',function(){
	var volume = player.video.volume - 0.1;

	if( volume < 0 )
		volume = 0;

	player.video.volume = volume;
});

player.volume_up.addEventListener('click',function(){
	var volume = player.video.volume + 0.1;

	if( volume > 1 )
		volume = 1;

	player.video.volume = volume;
});

/**
 * SEEKBAR
 */
window.setInterval( function()
{
	var progress_ratio   = player.video.currentTime / player.video.duration,
		progress_percent = progress_ratio * 100 + '%';
	
	player.progress_bar.style.width = progress_percent;
}, 100 );

player.seek_bar.addEventListener( 'click', function(e)
{
	var bounding_rect  = player.seek_bar.getBoundingClientRect(),
		progress_ratio = ( e.clientX - bounding_rect.left ) / bounding_rect.width,
		progress_time  = progress_ratio * player.video.duration;

	player.video.currentTime = progress_time;
} );

/**
 * DEBUG
 */
player.video.controls = true;
player.video.play();