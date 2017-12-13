<?php
function func() 
{
	global $code;
	$config = array();
	$config["name"] = "hello world";
	$config[$code] = "minds";

	return $config;
	//return ['name' => "hello world"];
}


return func();