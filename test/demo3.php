<?php
Class A { 
  public function demo1() {
  	var_dump(" this is public");
  }

  private function demo2() {
  	var_dump(" this is private");
  }

  protected function demo3(){
  	var_dump(" this is protected");
  }

  public function demo4() {
  	$this -> demo1();
  	$this -> demo2();
  	$this -> demo3();
  }
}

Class B extends A {

  public function demo1() {
  	parent::demo1();
  	var_dump("this is demo1");
  }
  public function demo5() {
  	$this -> demo4();
   }

}


$a = new A();
$a ->demo1();
//$a ->demo2();
// $a ->demo3();
//$a ->demo4();

$b = new B();
$b -> demo5();

