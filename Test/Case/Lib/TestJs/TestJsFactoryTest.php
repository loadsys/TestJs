<?php

App::uses('TestJsFactory', 'TestJs.Lib/TestJs');

class TestJsFactoryTest extends CakeTestCase {
	public function testFactoryWithValidFramework() {
		$factory = new TestJsFactory(array('framework' => 'qunit'));
		$this->assertEquals('qunit', $factory->framework);
		$this->assertEquals(array(), $factory->options);
	}

	public function testFactoryWithValidFrameworkAndOptions() {
		$factory = new TestJsFactory(array('framework' => 'mocha', 'chai' => 'expect'));
		$this->assertEquals('mocha', $factory->framework);
		$this->assertEquals(array('chai' => 'expect'), $factory->options);
	}

	public function testFactoryWithMissingFrameworkOption() {
		try {
			$factory = new TestJsFactory();
		} catch (InvalidArgumentException $e) {
			$this->assertRegExp("/Missing or invalid 'framework'/", $e->getMessage());
			return;
		}
		$this->assertTrue(false, 'Exception was not caught');
	}

	public function testFactoryWithInvalidFrameworkOption() {
		try {
			$factory = new TestJsFactory(array('framework' => 'invalid'));
		} catch (InvalidArgumentException $e) {
			$this->assertRegExp("/Missing or invalid 'framework'/", $e->getMessage());
			return;
		}
		$this->assertTrue(false, 'Exception was not caught');
	}
}

