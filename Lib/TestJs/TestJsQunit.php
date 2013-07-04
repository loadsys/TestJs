<?php

App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsQunit extends TestJsFramework {
	public function jsFiles() {
		return array('/test_js/js/qunit.js');
	}

	public function cssFiles() {
		return array('/test_js/css/qunit.css');
	}

	public function markup() {
		return "<div id=\"qunit\"></div>\n<div id=\"qunit-fixture\"></div>";
	}
}

