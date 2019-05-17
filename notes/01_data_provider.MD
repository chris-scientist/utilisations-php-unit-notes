
# Notes sur l'utilisation de PHP Unit

[Sommaire](../README.MD)

## Fournisseur de données (DataProvider)

Voici les tests que nous avons écrit à l'origine :
```
<?php

require __DIR__ . '/../src/main.php';

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase {

	public function test25Years() {
		$this->assertEquals(
			People::isFrenchAdult(25),
			true
		);
	}

	public function test18Years() {
		$this->assertEquals(
			People::isFrenchAdult(18),
			true
		);
	}

	public function test17Years() {
		$this->assertEquals(
			People::isFrenchAdult(17),
			false
		);
	}

	public function test1Years() {
		$this->assertEquals(
			People::isFrenchAdult(1),
			false
		);
	}

}
```

Ces derniers tests peuvent être réduit en utilisant un **fournisseur de données**, comme ceci :
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
```

## Exécuter les tests

```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/main-tests
```

Résultat :
```
PHPUnit 7.5.11 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 25 ms, Memory: 4.00 MB

OK (4 tests, 4 assertions)
```

