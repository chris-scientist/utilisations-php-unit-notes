<?php

class People {

	public static function isFrenchAdult($age) {
		return ( $age >= 18 ) ;
	}

}

class CheckRights {

	public static function haveRights($age) {
		return People::isFrenchAdult($age) ?
			'Welcome on adult area'
		:
			'Welcome on children area'
		;
	}

}