<?php 

class MyClass {
	
	function get(){
		var_dump("Hello");
	}
}

class MyClass2 extends MyClass {

	function get() {
		var_dump("world");
	}
}

$a = new MyClass2();
$a -> get();

