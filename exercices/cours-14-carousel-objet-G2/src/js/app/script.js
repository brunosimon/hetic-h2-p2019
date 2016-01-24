var Carousel = function( $target )
{
	this.$                  = {};
	this.$.container        = $target;
	this.$.next             = this.$.container.find( '.next' );
	this.$.prev             = this.$.container.find( '.prev' );
	this.$.slides_container = this.$.container.find( '.items' );
	this.$.slides           = this.$.slides_container.find( '.item' );

	this.count = this.$.slides.length;

	this.init_events();
};

Carousel.prototype.count = 0;
Carousel.prototype.index = 0;

Carousel.prototype.init_events = function()
{
	var that = this;

	this.$.next.on( 'click', function()
	{
		that.next();

		return false;
	} );

	this.$.prev.on( 'click', function()
	{
		that.prev();

		return false;
	} );
};

Carousel.prototype.next = function()
{
	this.go_to( this.index + 1 );
};

Carousel.prototype.prev = function()
{
	this.go_to( this.index - 1 );
};

Carousel.prototype.go_to = function( index )
{
	// Clamp
	if( index < 0 )
		index = 0;
	else if( index > this.count - 1 )
		index = this.count - 1;

	// Animate
	this.$.slides_container.animate( {
		left : - 600 * index
	} );

	this.index = index;
};

var $carousels = $( '.carousel' );

$carousels.each( function()
{
	var $carousel = $( this ),
		carousel  = new Carousel( $carousel );
} );