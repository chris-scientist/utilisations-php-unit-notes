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
