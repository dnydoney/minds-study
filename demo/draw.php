<?php

class Draw {

	var $im ;
	var $drawColor;
	var $begin = [100,100];
	var $dest = [200,100];
	var $step = 100;

	function __construct() {
		//1、创建画布
		$this->im = imagecreatetruecolor(600,400);
		//新建一个真彩色图像，默认背景是黑色，返回图像标识符。另外还有一个函数 imagecreate 已经不推荐使用。
		//2、绘制所需要的图像
		$this->drawColor = imagecolorallocate($this->im,255,0,0);
		//创建一个颜色，以供使用	

	}

	function go() {
		
		// $func = function($value) {
  		// 		return $value + $this->len;
		// };
		// array_map($func, $this->begin);
		
		$this->drawLine();
	}

	function next() {
		$this->begin[0] += $this->step;
		$this->dest[0] += $this->step;
		$this->drawLine();
	}

	function turnLeft(){

	}

	function turnRight(){

	}

	function done() {
		$this->drawImage();
	}

	function drawLine() {	
		imageline($this->im,$this->begin[0],$this->begin[1],$this->dest[0],$this->dest[1],$this->drawColor);
		//画一条直线。参数说明：30，30表示起点坐标；240，140表示终点坐标
	}

	private function drawImage(){

		//3、输出图像
		header("content-type: image/png");
		imagepng($this->im);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
	}

	function __destruct(){
		//4、销毁图像，释放内存
		imagedestroy($this->im);
	}
}

$draw = new Draw();
$draw -> go();
$draw -> next();
$draw -> next();
$draw -> next();
$draw -> done();