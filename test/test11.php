<?php

/**
 *  多继承方式
 */
trait custom {

	public function hello() {
		var_dump("Hello");
	}
}

trait custom2 {
	public function hello() {
		var_dump("world");
	}
}

class intest {
	use custom, custom2 {
		custom2::hello insteadof custom; 
	}
}

$obj = new intest();
$obj->hello();
