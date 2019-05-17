
# Notes sur l'utilisation de PHP Unit

[Sommaire](../README.MD)

## Fichier unique avec plusieurs classes

Soit le code source suivant :
```
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
```

Nous écrivons alors les tests suivants :
```
<?php

require __DIR__ . '/../src/main.php';

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase {

	/**
	 * @dataProvider dataOnPeople
	 */
	public function testIsFrenchAdult($inputAge, $result) {
		$this->assertSame(People::isFrenchAdult($inputAge), $result);
	}

	public function dataOnPeople() {
		return [
			'1 years' => [1, false],
			'17 years' => [17, false],
			'18 years' => [18, true],
			'25 years' => [25, true]
		];
	}

}

class CheckRightsTest extends TestCase {

	/**
	 * @dataProvider dataForCheckRights
	 */
	public function testHaveRights($inputAge, $result) {
		$this->assertSame(CheckRights::haveRights($inputAge), $result);
	}
	
	public function dataForCheckRights() {
		$childrenStr = 'Welcome on children area';
		$adultStr = 'Welcome on adult area';
		return [
			'10 years' => [10, $childrenStr],
			'18 years' => [18, $adultStr],
			'25 years' => [25, $adultStr]
		];
	}

}

```

## Exécuter les tests

### De PeopleTest

Commande pour exécuter les tests :
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php PeopleTest tests/main-tests.php
```

Résultat :
```
PHPUnit 7.5.11 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 25 ms, Memory: 4.00 MB

OK (4 tests, 4 assertions)
```

### De CheckRightsTest

Commande pour exécuter les tests :
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php CheckRightsTest tests/main-tests.php
```

Résultat :
```
PHPUnit 7.5.11 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 25 ms, Memory: 4.00 MB

OK (3 tests, 3 assertions)
```
