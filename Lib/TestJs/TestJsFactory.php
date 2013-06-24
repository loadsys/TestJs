<?php

App::uses('TestJsRunner',  'TestJs.Lib/TestJs');

class TestJsFactory {
	public $framework;
	public $options;

	public function __construct($config = array()) {
		if (!isset($config['framework'])) {
			throw new InvalidArgumentException("Missing or invalid 'framework' key in config");
		}
		$this->framework = strtolower($config['framework']);
		$this->options = array_diff_key($config, array('framework' => true));
	}

	public function runner() {
		$framework = $this->getFrameworkClassName();
		return new TestJsRunner(new $framework($this->options));
	}

	private function getFrameworkClassName() {
		$framework = 'TestJs' . ucfirst($this->framework);
		App::uses($framework, 'TestJs.Lib/TestJs');
		App::uses($framework, 'Lib/TestJs');
		if (!class_exists($framework)) {
			throw new LogicException("Could not find class {$framework}. Create {$framework}.php in Lib/TestJs/.");
		}
		return $framework;
	}
}

