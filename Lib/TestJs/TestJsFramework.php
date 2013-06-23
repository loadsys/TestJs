<?php

class TestJsFramework {
	protected $options;

	public function __construct($options = array()) {
		$this->options = $options;
	}

	public function jsFiles() {
		return array();
	}

	public function cssFiles() {
		return array();
	}

	public function markup() {
		return '';
	}

	public function extras() {
		return '';
	}

	public function startup() {
		return '';
	}
}

