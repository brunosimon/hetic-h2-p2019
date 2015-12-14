/**
 * SET UP
 */
var player = {};

player.container    = document.querySelector('.player');
player.video        = document.querySelector('video');
player.volumeUp     = document.querySelector('.volumeUp');
player.volumeDown   = document.querySelector('.volumeDown');
player.seek_bar     = document.querySelector('.seek-bar');
player.progress_bar = document.querySelector('.progress-bar');

/**
 * VOLUME
 */
player.volumeUp.onclick = function()
{
	volume = player.video.volume + 0.1;

	if(volume > 1)
		volume = 1;

	player.video.volume = volume;
};

player.volumeDown.onclick = function()
{
	volume = player.video.volume - 0.1;

	if(volume < 0)
		volume = 0;

	player.video.volume = volume;
};

/**
 * SEEK BAR
 */
window.setInterval(function()
{
	var ratio = player.video.currentTime / player.video.duration;
	player.progress_bar.style.transform = 'scaleX(' + ratio + ')';

},100);

player.seek_bar.onclick = function(e)
{
	var bounding_rect = player.seek_bar.getBoundingClientRect(),
		x             = e.clientX - bounding_rect.left,
		ratio         = x / bounding_rect.width,
		temps         = ratio * player.video.duration;

	player.video.currentTime = temps;
};

