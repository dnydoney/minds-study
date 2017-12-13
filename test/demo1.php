<?php 

class MyClass{
	public $code = "test";
	function demo() {
		var_dump($this->code);
	}

	static function getNew() {
		return new static;
	}
}

class test extends MyClass {
}

$a = MyClass::getNew();
var_dump($a instanceof test);

$b = test::getNew();
var_dump($b instanceof test);










