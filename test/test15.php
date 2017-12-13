<?php

$a = 10;
$b = 2;

class maths {

	static public function add($a, $b)
	{
		return $a + $b;
	}


	static public function mins($a, $b)
	{
		return $a - $b;
	}

	static public function multi($a, $b)
	{
		return $a * $b;
	}

	static public function div($a, $b)
	{
		return $a /$b;
	}
}




Class Operators {
	private function Operators() {

	}

	static public $instance;
	static public function GetInstance() {



		if(!self::$instance)
			//self::$instance = new static;
			self::$instance = new self();
		
		return self::$instance;
	}

	public function operator($a = 0, $b = 0, $op = "+") {
		$result = 0;
		switch ($op) {
			case '+':
				$result =  maths::add($a, $b);
				break;
			case '-':
				$result =  maths::mins($a, $b);
				break;
			case '*':
				$result =  maths::multi($a, $b);
				break;
			case '/':
				$result =  maths::div($a, $b);
				break;
							
			default:
				return null;
				break;
		}

		return $result;
	}


}


// var_dump(maths::add($a, $b));
// var_dump(maths::mins($a, $b));
// var_dump(maths::multi($a, $b));
// var_dump(maths::div($a, $b));


$instance = Operators::GetInstance();
var_dump($instance->operator($a, $b,"+"));




