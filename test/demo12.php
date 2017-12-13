<?php
header("Content-Type:text/html; charset=utf-8");

$classname = "efg";

class A {

  public $classname = "abc";
  function func() {
  	 global $classname;
  	 var_dump($this ->classname);
  }

}

function output() {
	var_dump("no param");
	exit;
}

$a  = new A(); 

//var_dump($_GET);

in_array("op", $_GET) && output();
$op = $_GET["op"] ? trim($_GET["op"]) : output();
$ac = $_GET["ac"] ? trim($_GET["ac"]) :output();


var_dump(urldecode($op));
var_dump(htmlspecialchars($ac));


  var_dump($_ENV);


// var_dump($GLOBALS);
// var_dump("------------------------------------------");
// var_dump($_SERVER);
