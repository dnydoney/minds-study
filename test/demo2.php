<?php

Class A {
	function demoA() {
		var_dump("this is A");
	}
}


Class C {
	function demoC() {
		var_dump("this is C");
	}
}

trait SayHello {
	public function demoCD () {
		var_dump("hhh");
	}
}

Class B extends A {
	use SayHello;
	function demoB() {			
		var_dump("this is B");		
	}
}


$b = new B();
$b -> demoA();
$b -> demoB();
$b -> demoCD();
