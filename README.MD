
# Notes sur l'utilisation de PHP Unit

v0.1

## Pré-requis

**Être sous macOS** !

## Installation de l'environnement

### Installer Composer

[Voir documentation](https://getcomposer.org/download/)

### Installer PHP Unit via Composer

```
composer.phar require --dev phpunit/phpunit
```

Puis contrôler la version de PHP Unit

```
./vendor/bin/phpunit --version
```

## Créer le code et les tests

Dans *src/main.php* :
```
<?php

class People {

	public static function isFrenchAdult($age) {
		return ( $age >= 18 ) ;
	}

}
```

Dans *tests/main-tests.php* :
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

## Conclusion

Voir la branche *tests-php-unit* pour le code source.
