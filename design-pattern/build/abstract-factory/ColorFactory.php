<?php
public class ColorFactory extends AbstractFactory {

	public function getShape($shapeType) {		
		return null;
	}

	public function getColor($colorType) {
		if( $colorType == null )
			return null;

		if( $colorType == "Red" ) {
			return new Red();
		} elseif( $colorType == "Green" ) {
			return new Green();
		} elseif( $colorType == "Blue" ) {
			return new Blue();
		}
	}
}