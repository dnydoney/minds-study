<?php

interface A {
	const ac = '123';
	const b = 'Interface constant';

	public function func();
	//public function func1();
}

Class B {
	function func(){
      var_dump("this is from B func");
	}
}

Class C extends B implements A {
	function func() {
	  var_dump("this is from C func");
	}
}


$c = new C();
$c -> func();
