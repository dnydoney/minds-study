<?php

function ex($param) {

	$argvar = func_get_args();
	$func = $argvar[0];
	$funcargs = array_slice($argvar, 1);
	if(function_exists($func)) {
		$returnValue = call_user_func_array($func, $funcargs);		
	} else {
		$funcpath = "scripts/" . $func . ".php";
		require_once($funcpath);
		if (function_exists($func)) {
			$returnValue = call_user_func_array($func, $funcargs);	
		} else {
			die ("Sorry $func IS NOT USABLE.");
		}
	}

	return $returnValue;
}


class Foo {
	public $i = " I = 12345678 \n";
	public function showI() {
		echo ( $this ->i );
	}

	public function __destruct() {
		echo( "in __destruct \n" );
		if( $GLOBALS['flag'] ) {
			$GLOBALS['test'][0] = $this;
		}
	}

}

$flag = true;
//$test = [new Foo()];
$test = [];
var_dump("Deleting Foo \n");
unset($test[0]);
var_dump("Deleted Foo \n");
// $test[0] -> showI();
// $flag = false;
// var_dump("re-Deleting Foo \n");





