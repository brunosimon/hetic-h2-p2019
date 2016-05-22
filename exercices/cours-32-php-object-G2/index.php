<?php

	class MyClass
	{
		public $foo = 'bar';

		public function __construct($name = 'john')
		{
			echo '<br>Construct '.$name;
		}

		public function doSomething()
		{
			echo '<br>foo is equal to '.$this->foo;
		}
	}

	$myClass1 = new MyClass('toto');
	$myClass2 = new MyClass();
	$myClass3 = new MyClass('tutu');
