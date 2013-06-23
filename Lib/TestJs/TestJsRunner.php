<?php

class TestJsRunner {
	public function __construct($framework = null) {
		if (!$framework) {
			throw new InvalidArgumentException('Missing framework class');
		}
		$this->framework = $framework;
	}

	public function jsFiles() {
		return $this->framework->jsFiles();
	}

	public function cssFiles() {
		return $this->framework->cssFiles();
	}

	public function extras() {
		return $this->framework->extras();
	}

	public function markup() {
		return $this->framework->markup();
	}

	public function startup() {
		return $this->framework->startup();
	}
}

