<?php
class Secretary {
	private $observers = array();
	private $action;

	//增加
	public function Attach($observer) {
		$this->observers[] = $observer;
	}

	//通知
	public function Notify() {
		foreach ($this->observers as $key => $value) {
			$value->update();		
		}
	}

	function SetAction($action) {
		$this->action = $action;
	}

	function getAction(){
		return $this->action;
	}
	
}