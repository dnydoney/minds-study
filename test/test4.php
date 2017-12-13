<?php

class A{

	public $num = 0;
	function foo() {
		if(isset($this)) {
			var_dump("this is defined  \n");
			echo get_class($this);

		} else {
			var_dump("$this is not defined");
		}
	}


}

class B {
	function bar() {
		A::foo();
	}
	function bar2() {
		$a = new A();
		$a->foo();
	}
}


// $a = new A();
// $a->foo();

// A::foo();

// $b = new B();
// $b->bar2();

// B::bar();
// 


$className = "A";
$a = new $className();
$a->foo();
$a->num = 10;

var_dump($a->num);

$b = &$a;
$b->num = 20;

var_dump($b->num);
var_dump($a->num);


class test {

	static public function getNew(){
		return new static;
	}

}


class child extends test {

}

$obj1 = new test();
$obj2 = new $obj1;


var_dump( $obj1 == $obj2 );

$obj3 = test::getNew();
var_dump($obj3 instanceof test);

$obj4 = child::getNew();
var_dump($obj4 instanceof child);

var_dump($obj4 instanceof StdClass);

function test123(){

	class demo {
		function test() {
			var_dump("Hello World!");
		}
	}
	if(class_exists("demo")) {
		$a = new demo();
		$a -> test();
	} else {
		var_dump(" func class no defin");
	}
}

if(class_exists("demo")) {
	$aa = new demo();
	$aa -> test();

}else {
	var_dump(" demo class no defin");
}

test123();



