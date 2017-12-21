<?php
public class ShapeFactory {
	public function getShape($shapeType) {
		
		if($shapeType == null)
			return ;

		if( $shapeType == "Circle" ){
			 return new Circle();
		} elseif( $shapeType == "Rectangle" ) {
			return new Rectangle();
		} elseif( $shapeType == "Square" ) {
			return new Square();
		}

	}
}

