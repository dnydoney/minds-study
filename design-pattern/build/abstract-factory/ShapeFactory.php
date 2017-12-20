<?php
public class ShapeFactory extends AbstractFactory {

	public function getShape($shapeType) {
		
		if($shapeType == null)
			return ;

		if( $shapeType == "Circle" ) {
			return new Circle();
		} elseif( $shapeType == "Rectangle" ) {
			return new Rectangle();
		} elseif( $shapeType == "Square" ) { 
			return new Square();
		}
	}

	public function getColor($colorType) {
		return null;
	}
}