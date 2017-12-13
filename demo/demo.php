<?php

error_reporting(E_ALL); 
ini_set('display_errors', '1'); 

include_once "button.php";
include_once "OnClick.php";
class thisClick implements OnClick{
	function onClick() {
		var_dump("Hello");
	}
}

$obj = new thisClick();

$button = new Button();
$button->Click($obj);

