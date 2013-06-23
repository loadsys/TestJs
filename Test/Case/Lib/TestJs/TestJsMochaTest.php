<?php

App::uses('TestJsMocha', 'TestJs.Lib/TestJs');

class TestJsMochaTest extends CakeTestCase {
	public $_testStr = "<script>%s\nmocha.setup('bdd');</script>";

	public function testDefaultExtras() {
		$mocha = new TestJsMocha();
		$expected = sprintf($this->_testStr, 'window.expect = chai.expect;');
		$this->assertEquals($expected, $mocha->extras());
	}

	public function testAssertExtras() {
		$mocha = new TestJsMocha(array('chai' => 'assert'));
		$expected = sprintf($this->_testStr, 'window.assert = chai.assert;');
		$this->assertEquals($expected, $mocha->extras());
	}

	public function testExpectExtras() {
		$mocha = new TestJsMocha(array('chai' => 'expect'));
		$expected = sprintf($this->_testStr, 'window.expect = chai.expect;');
		$this->assertEquals($expected, $mocha->extras());
	}

	public function testShouldExtras() {
		$mocha = new TestJsMocha(array('chai' => 'should'));
		$expected = sprintf($this->_testStr, 'chai.should();');
		$this->assertEquals($expected, $mocha->extras());
	}
}

