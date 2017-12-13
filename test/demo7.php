<?php 

 function __autoload($classname){
 	var_dump("this is autoload !");
 	include $classname . ".php";
 	if(class_exists($classname)){

 	} else {
 		var_dump("this $classname is not found ");
 	}
 }


 // $className = "A";
 // $func_name = "func";

 // $a = new $className();
 // $a ->$func_name();


 function my_autoload($classname) {
 	var_dump("this is my_autoload");

 	var_dump(func_num_args());
 	//var_dump(func_get_arg());
 	var_dump(func_get_args());

 	include_once "A.php";
 }

spl_autoload_register("my_autoload", true);



spl_autoload_register(function($classname){
	var_dump("this is spl_autoload_register");
	include_once "B.php";
});



$a = new A();
$a -> func();

$b = new B();
$b -> func();

