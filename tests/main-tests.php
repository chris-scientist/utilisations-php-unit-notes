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