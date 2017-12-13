<?php

class propTest {
	private $data = array();
	public $declared = 1;
	private $hidden = 2;

	public function __set($name, $value){
		var_dump("Setting '$name' to '$value'\n");
        $this->data[$name] = $value;
	}

	public function __get($name){
		var_dump("getting '$name'!");
		if(array_key_exists($name, $this->data)){
			return $this->data[$name];
		}

  		$trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
	}

	 /**  PHP 5.1.0之后版本 */
    public function __isset($name) 
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  PHP 5.1.0之后版本 */
    public function __unset($name) 
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  非魔术方法  */
    public function getHidden() 
    {
        return $this->hidden;
    }
}

$obj = new propTest();
//$obj->a = 1;
var_dump($obj->getHidden());