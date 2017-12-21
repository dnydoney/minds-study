<?php

	public function autoload($class)
    {
        $class = strtolower($class);
        if (!@include_once($class.'.php')) {
                exit("Class Error: {$class}.isn't exists!");
            }
        }
    }

	if(function_exists('spl_autoload_register')) {
		spl_autoload_register('autoload');
	} else {
		function __autoload($class) {
			return autoload($class);
		}
	}

	$shapeFactory = new ShapeFactory();

	//获取 Circle 的对象，并调用它的 draw 方法
	$shape1 = $shapeFactory->getShape("CIRCLE");

	//调用 Circle 的 draw 方法
	$shape1->draw();

	//获取 Rectangle 的对象，并调用它的 draw 方法
	$shape2 = $shapeFactory->getShape("RECTANGLE");

	//调用 Rectangle 的 draw 方法
	$shape2->draw();

	//获取 Square 的对象，并调用它的 draw 方法
	$shape3 = $shapeFactory->getShape("SQUARE");

	//调用 Square 的 draw 方法
	$shape3->draw();
