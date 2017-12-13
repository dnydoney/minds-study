<?php 

$a = 0;

if(isset($a)) {
	function func() {
		var_dump("this is func");
		$a = 1;
		var_dump(" this is $a ");
		Class C {
			function demo() {
				var_dump(" this is demo");
			}

			function func() {
				$a = 3;
				var_dump(" this is $a ");
			}

		}

		$a = 2;
		$c = new C();
		$c -> demo();
		var_dump(" this is $a ");
	}
}

if(function_exists("func")) {
	func();
}
