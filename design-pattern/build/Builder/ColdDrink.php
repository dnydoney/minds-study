<?php
public abstract class ColdDrink implements Item {
	public function packing {
		return new Bottle();
	}
	public abstract function price();
}