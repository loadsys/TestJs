<?php

App::uses('TestJsRunner', 'TestJs.Lib');

class TestJsRunnerTest extends CakeTestCase {
	public function testMochaJsFiles() {
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'expect'));
		$expected = array(
			'chai.js',
			'sinon.js',
			'sinon-chai.js',
			'mocha.js'
		);
		$this->assertEquals($expected, $runner->jsFiles());
	}

	public function testMochaCssFiles() {
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'expect'));
		$expected = array('mocha.css');
		$this->assertEquals($expected, $runner->cssFiles());
	}

	public function testQunitJsFiles() {
		$runner = new TestJsRunner(array('qunit' => true));
		$expected = array(
			'sinon.js',
			'qunit.js',
			'qunit-sinon.js'
		);
		$this->assertEquals($expected, $runner->jsFiles());
	}
	
	public function testQunitCssFiles() {
		$runner = new TestJsRunner(array('qunit' => true));
		$expected = array('qunit.css');
		$this->assertEquals($expected, $runner->cssFiles());
	}

	public function testJasmineJsFiles() {
		$runner = new TestJsRunner(array('jasmine' => true));
		$expected = array(
			'sinon.js',
			'jasmine.js',
			'jasmine-sinon.js',
			'jasmine-html.js'
		);
		$this->assertEquals($expected, $runner->jsFiles());
	}

	public function testJasmineCssFiles() {
		$runner = new TestJsRunner(array('jasmine' => true));
		$expected = array('jasmine.css');
		$this->assertEquals($expected, $runner->cssFiles());
	}

	public function testMochaExtrasWithAssert() {
		$expected = "<script>window.assert = chai.assert;</script>\n<script>mocha.setup('bdd');</script>";
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'assert'));
		$this->assertEquals($expected, $runner->extras());
	}
	
	public function testMochaExtrasWithExpect() {
		$expected = "<script>window.expect = chai.expect;</script>\n<script>mocha.setup('bdd');</script>";
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'expect'));
		$this->assertEquals($expected, $runner->extras());
	}

	public function testMochaExtrasWithShould() {
		$expected = "<script>chai.should();</script>\n<script>mocha.setup('bdd');</script>";
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'should'));
		$this->assertEquals($expected, $runner->extras());
	}

	public function testQunitExtras() {
		$runner = new TestJsRunner(array('qunit' => true));
		$this->assertEquals('', $runner->extras());
	}

	public function testJasmineExtras() {
		$runner = new TestJsRunner(array('jasmine' => true));
		$this->assertEquals('', $runner->extras());
	}

	public function testMochaMarkup() {
		$expected = '<div id="mocha"></div>';
		$runner = new TestJsRunner(array('mocha' => true, 'chai' => 'should'));
		$this->assertEquals($expected, $runner->markup());
	}

	public function testJasmineMarkup() {
		$runner = new TestJsRunner(array('jasmine' => true));
		$this->assertEquals('', $runner->markup());
	}

	public function testQunitMarkup() {
		$expected = "<div id=\"qunit\"></div>\n<div id=\"qunit-fixture\"></div>";
		$runner = new TestJsRunner(array('qunit' => true));
		$this->assertEquals($expected, $runner->markup());
	}
}

