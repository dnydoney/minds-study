<?php

/**
 *  1, 所有的代码都在一个文件里
 *  2，数据库神操作都在一个文件里
 *  3，面向对象设计需要进一步优化
 *  4，所有的返回数据需要JSON格式化
 * 
 */
@include_once "mysql.php"; 

$op = $_GET["op"] ? trim($_GET["op"]) : output("no param");
if(array_key_exists("ac", $_GET)) {	
	$ac = trim($_GET["ac"]);
} else {
	$ac = "index";
}
// 获取GET请求所有参数
$param = array();
foreach ($_GET as $key => $value) {
	$param[$key] = $value;
}

array_shift($param);
array_shift($param);
//$GLOBALS["param"]  = $param;


//加载系统配置信息
if(file_exists('config.php'))
{
	$conf = @require 'config.php';
}

if(intval($conf["DB_LINK"]) == 1)
{
	// 加载MYSQL驱动
	$db = new mysql($conf["DB_NAME"],$conf["DB_USER"],$conf["DB_PWD"]);	
}


if(file_exists($op . "Action.php")) {
	@include_once "Action.php";
	@include_once $op . "Action.php";
	$className = $op . "Action";
	$class = new $className();	
	if(method_exists($class, $ac)) {
		if(isset($param)){
			$reflectionMethod = new ReflectionMethod($className, $ac);
 			$reflectionMethod->invokeArgs($class, $param);
			//$class -> $ac($param);
		} else {
			$class -> $ac();	
		}

		// 反射调用参数

	} else {
		$class -> index();
	}
} else {
	// 4001 = no file 
	$return = ["code" => 40001,"msg"=>"no file"];
	output(json_encode($return));
}


/**
 * 返回接口信息
 * [output description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
function output($data) {
	header("Content-Type:text/html; charset=utf-8");
	echo $data;
	exit;
}


