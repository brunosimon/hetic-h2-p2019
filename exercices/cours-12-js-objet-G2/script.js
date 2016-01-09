// Class Bike
var Bike = function(color)
{
	this.color = color || 'black';
};

Bike.prototype.color = 'black';
Bike.prototype.speed = 0;
Bike.prototype.accelerate = function()
{
	this.speed++;
};

// Class Bandit
var Bandit = function(color)
{
	this.color = color || 'black';
};

Bandit.prototype = Object.create(Bike.prototype);
Bandit.prototype.brand = 'Suzuki';

// Class
var App = function()
{
	this.bike_1 = new Bike();
	this.bike_2 = new Bandit();
};

var app = new App();