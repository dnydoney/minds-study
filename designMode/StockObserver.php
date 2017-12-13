<?php
class StockObserver{
	private $name;
	private $sub = new Secretary();

	public StockObserver($name, $sub) {
		$this->name = $name;
		$this->sub = $sub;
	}

	public function Update(){
		$info = $this->name . $this->sub->getAction() ;
		$info .= " close now, go work!";
		var_dump($info);
	}
}