<?php

App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsMocha extends TestJsFramework {
	public function jsFiles() {
		return array(
			'/test_js/js/chai.js',
			'/test_js/js/sinon.js',
			'/test_js/js/sinon-chai.js',
			'/test_js/js/mocha.js'
		);
	}

	public function cssFiles() {
		return array('/test_js/css/mocha.css');
	}

	public function markup() {
		return '<div id="mocha"></div>';
	}

	public function extras() {
		$chai = 'expect';
		$types = array('expect', 'assert', 'should');
		if (
			isset($this->options['chai']) &&
			in_array(strtolower($this->options['chai']), $types)
		) {
			$chai = strtolower($this->options['chai']);
		}
		if ($chai === 'assert') {
			$assert = "window.assert = chai.assert;";
		} else if ($chai === 'expect') {
			$assert = "window.expect = chai.expect;";
		} else if ($chai === 'should') {
			$assert = "chai.should();";
		}
		return "<script>{$assert}\nmocha.setup('bdd');</script>";
	}

	public function startup() {
		return "<script>if (window.mochaPhantomJS) { mochaPhantomJS.run(); } else { mocha.run(); }</script>";
	}
}

