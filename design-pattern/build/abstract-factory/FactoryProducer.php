<?php
public class FactoryProducer {
	public static function getFactory($factory) {
		if ( $factory == "Shape" ) {
			return new ShapeFactotry();
		} elseif( $factory == "Color" )) {
			return new ColorFactory();
		}

		return null;
	}
}