<?php

App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsQunit extends TestJsFramework {
	public function jsFiles() {
		return array(
			'/test_js/js/sinon.js',
			'/test_js/js/qunit.js',
			'/test_js/js/qunit-sinon.js'
		);
	}

	public function cssFiles() {
		return array('/test_js/css/qunit.css');
	}

	public function markup() {
		return "<div id=\"qunit\"></div>\n<div id=\"qunit-fixture\"></div>";
	}
}

