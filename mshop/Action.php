<?php

class Action {
	public $param = array();
	public function Action()
	{
		$this ->param = $GLOBALS["param"];
	}

}