<?php
abstract Class A {
	public $a = 123;
  abstract function func();
  function func1() {
  	var_dump("this is normal");
  }
}

 abstract class B {
	abstract function func();
}

class C extends A {
	function func() {

	}	
}

class D extends C {

}

$a = new D();
