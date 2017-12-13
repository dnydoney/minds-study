<?php 

Class Model {

	 public function Model(){
	 	var_dump("it is MOdel");
	}

	function func1() {

		var_dump("Hello");
		return $this;

	}

	function func2() {
		var_dump("World");
		return $this;
	}

}

$class = new Model();
$class->func1()->func2();

