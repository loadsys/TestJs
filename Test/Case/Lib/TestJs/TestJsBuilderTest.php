<?php

App::uses('TestJsBuilder', 'TestJs.Lib/TestJs');
App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsTesting extends TestJsFramework {
}

class TestJsBuilderTest extends CakeTestCase {
	public function testBuilderWithValidFramework() {
		$builder = new TestJsBuilder(array('framework' => 'qunit'));
		$this->assertEquals('qunit', $builder->framework);
		$this->assertEquals(array(), $builder->options);
	}

	public function testBuilderWithValidFrameworkAndOptions() {
		$builder = new TestJsBuilder(array('framework' => 'mocha', 'chai' => 'expect'));
		$this->assertEquals('mocha', $builder->framework);
		$this->assertEquals(array('chai' => 'expect'), $builder->options);
	}

	public function testBuilderWithMissingFrameworkOption() {
		try {
			$builder = new TestJsBuilder();
		} catch (InvalidArgumentException $e) {
			$this->assertRegExp("/Missing or invalid 'framework'/", $e->getMessage());
			return;
		}
		$this->assertTrue(false, 'Exception was not caught');
	}

	public function testRunnerReturnsARunnerWithFrameworkInstance() {
		$builder = new TestJsBuilder(array('framework' => 'testing'));
		$runner = $builder->runner();
		$this->assertInstanceOf('TestJsTesting', $runner->framework);
	}

	public function testRunnerThrowsExceptionWhenFrameworkClassIsNotFound() {
		try {
			$builder = new TestJsBuilder(array('framework' => 'invalid'));
			$runner = $builder->runner();
		} catch (LogicException $e) {
			$this->assertRegExp('/TestJsInvalid/', $e->getMessage());
			return;
		}
		$this->assertTrue(false, 'Exception was not caught');
	}
}

