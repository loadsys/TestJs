<?php

class TestJsQunit {
	public function jsFiles() {
		return array('sinon.js', 'qunit.js', 'qunit-sinon.js');
	}

	public function cssFiles() {
		return array('qunit.css');
	}

	public function markup() {
		return "<div id=\"qunit\"></div>\n<div id=\"qunit-fixture\"></div>";
	}
}

