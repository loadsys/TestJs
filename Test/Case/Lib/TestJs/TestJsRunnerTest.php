<?php

App::uses('TestJsRunner', 'TestJs.Lib/TestJs');
App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsTestFramework {
	public function jsFiles() {
		return array('key1' => 'value1');
	}
	public function cssFiles() {
		return array('key2' => 'value2');
	}
	public function markup() {
		return 'markup';
	}
	public function extras() {
		return 'extras';
	}
	public function startup() {
		return 'startup';
	}
}

class TestJsRunnerTest extends CakeTestCase {
	public function setUp() {
		$this->runner = new TestJsRunner(new TestJsTestFramework());
	}

	public function tearDown() {
		unset($this->runner);
	}

	public function testJsFiles() {
		$this->assertEquals(array('key1' => 'value1'), $this->runner->jsFiles());
	}

	public function testCssFiles() {
		$this->assertEquals(array('key2' => 'value2'), $this->runner->cssFiles());
	}

	public function testMarkup() {
		$this->assertEquals('markup', $this->runner->markup());
	}

	public function testExtras() {
		$this->assertEquals('extras', $this->runner->extras());
	}

	public function testStartup() {
		$this->assertEquals('startup', $this->runner->startup());
	}
}

