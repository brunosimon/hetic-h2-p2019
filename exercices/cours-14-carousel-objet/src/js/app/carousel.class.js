var Carousel = function( $target )
{
	// Set DOM
	this.$                      = {};
	this.$.container            = $target;
	this.$.pagination_container = this.$.container.find( '.pagination' );
	this.$.pagination_items     = this.$.pagination_container.find( '.item' );
	this.$.siblings_container   = this.$.container.find( '.siblings' );
	this.$.siblings_items       = this.$.siblings_container.find( '.sibling' );
	this.$.siblings_next        = this.$.siblings_items.filter( '.next' );
	this.$.siblings_prev        = this.$.siblings_items.filter( '.prev' );
	this.$.slides_container     = this.$.container.find( '.slides .items' );
	this.$.slides_items         = this.$.slides_container.find( '.item' );

	// Set properties
	this.count = this.$.slides_items.length;

	// Init
	this.init_events();
};

// Properties
Carousel.prototype.index = 0;
Carousel.prototype.count = 0;
Carousel.prototype.width = 600;

// Methods
Carousel.prototype.init_events = function()
{
	var that = this;

	// Next click
	this.$.siblings_next.on( 'click', function()
	{
		that.next();

		return false;
	} );

	// Prev click
	this.$.siblings_prev.on( 'click', function()
	{
		that.prev();

		return false;
	} );

	// Pagination click
	this.$.pagination_items.on( 'click', function()
	{
		var $pagination = $( this ),
			index       = $pagination.index();

		that.go_to( index );

		return false;
	} );
};

Carousel.prototype.go_to = function( index )
{
	// Limits
	if( index > this.count - 1 )
		index = 0;
	else if( index < 0 )
		index = this.count - 1;

	// Same
	if( index === this.index )
		return;

	// Animate
	this.$.slides_container.animate( {
		left : - index * this.width
	} );

	// Save new index
	this.index = index;

	// Update pagination
	this.update_pagination();
};

Carousel.prototype.next = function()
{
	this.go_to( this.index + 1 );
};

Carousel.prototype.prev = function()
{
	this.go_to( this.index - 1 );
};

Carousel.prototype.update_pagination = function()
{
	this.$.pagination_items.removeClass( 'active' );
	this.$.pagination_items.eq( this.index ).addClass( 'active' );
};