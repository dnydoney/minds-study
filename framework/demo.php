<?php

include_once "tpl.php";
if(class_exists("TPL")) {
	$tpl = new TPL();
} else {
	output(" on tmpl file");
}

//http://localhost/framework/index.php?op=index&ac=index

 $param = $_GET;
 !isset($param["op"]) && output("no url");
 // if(in_array("op", $param)) 
 // {
 // 	 output("no url");	
 // }
 !isset($param["ac"]) && output("no url");
 // if(in_array("ac", $param)) 
 // {
 // 	 output("no url"); 			
 // }
 
 $control = $param["op"];
 $control =  $control ?  $control : "index";

 $action = $param["ac"];
 $action = $action ?  $action : "index";

 // define("ACT", $control);
 // define("CTL",  $action);

 if(file_exists( $control . ".control.php")) {
 	require_once $control . ".control.php";
 	if(class_exists($control)) {
 		$obj = new $control();
 		if(method_exists($obj, $action)) {
 			$obj -> $action();
 		} else {
 			output("no methods");
 		}

 	} else {
 		output("no class");
 	}
 } else {
 	output("file no exists");
 }


function output($data) {
	header("Content-Type:text/html; charset=utf-8");
	echo $data;
	exit;
}



function display($filename) {
	header("Content-type: text/html; charset=utf-8");
 	$content = file_get_contents($filename);
 	ob_start();
 	//把字符串作为PHP代码执行
 	eval('?' . '>' . trim($content));
 	/* 	
 	  eval是在当前程序代码处嵌入php代码，
 	  如果想在php程序里面嵌套html并用eval函数执行，
 	  这时候要将当前程序代码结束掉才可以。
 	  简单的方法是加上?>结束符。
 	  
 	*/
 	$content = ob_get_contents();
 	ob_end_clean();
 	echo $content;    
}


