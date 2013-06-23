<?php

class AllTestJsTest extends CakeTestSuite {
	public static function suite() {
		$suite = new CakeTestSuite('All TestJs tests');
		$suite->addTestDirectory(TESTS . 'Case' . DS . 'Lib');
		return $suite;
	}
}
