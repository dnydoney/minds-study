<?php

namespace demo\test;

/**
 * 数组 转 对象
 *
 * @param array $arr 数组
 * @return object
 */
function array_to_object($arr) {
    if (gettype($arr) != 'array') {
        return;
    }
    foreach ($arr as $k => $v) {
        if (gettype($v) == 'array' || getType($v) == 'object') {
            $arr[$k] = (object)array_to_object($v);
        }
    }
 
    return (object)$arr;
}
 
/**
 * 对象 转 数组
 *
 * @param object $obj 对象
 * @return array
 */
function object_to_array($obj) {
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }
 
    return $obj;
}

function array2object($array) {
  if (is_array($array)) {
    $obj = new StdClass();
    foreach ($array as $key => $val){
      $obj->$key = $val;
    }
  }
  else { $obj = $array; }
  return $obj;
}

function object2array($object) {

  // 判断。。。。。
  if (!is_object($object))
  	return $object;

  // 判断。。。。。
  foreach ($object as $key => $value) {
      $array[$key] = $value;
  }

  return $array;
}
/**
 *  此类用于演示对象序列化和发序列化
 *  @author abc 123@126.com
 *  @date 2017-11-18
 */
class A {
	public $name = "abc";
	/**
	 * [func description]	
	 */
	function func() {
		var_dump("Hello World");
	}
	/**
	 * [func2 description]
	 * @param  [type] $classname  [description]
	 * @param  [type] $methodname [description]
	 * @return [type]             [description]
	 */
	function func2($classname,$methodname) {
		return (new $classname()) -> $methodname();
	}

	function __invoke($methodname) {
		$this->$methodname();
		throw new Exception(" it is error");
	}

}

$a = new A();
// $a -> func();

// var_dump($a -> name);
// foreach ($a as $key => $value) {
// 	var_dump( $key . "=" . $value);
// }

//$a("func");
//

$dd = serialize($a);
var_dump(serialize($a));

$classname = unserialize($dd);
$classname("func");


var_dump("Hello world");

var_dump(__NAMESPACE__);



