<?php 

	class MyClass {

		public $foo = 'bar';

		public function __construct($name = 'Timmy')
		{
			echo '<br>'.$name;
		}

		public function doSomething()
		{
			echo '<br>'.$this->foo;
		}

	}

	$myClass1 = new MyClass('toto');
	$myClass2 = new MyClass();
	$myClass3 = new MyClass('tutu');

