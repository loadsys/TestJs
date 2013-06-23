<?php

App::uses('TestJsRunner',  'TestJs.Lib/TestJs');

App::uses('TestJsMocha',   'TestJs.Lib/TestJs');
App::uses('TestJsQunit',   'TestJs.Lib/TestJs');
App::uses('TestJsJasmine', 'TestJs.Lib/TestJs');

class TestJsFactory {
	public $framework;
	public $options;

	private $valid = array('mocha', 'qunit', 'jasmine');

	public function __construct($config = array()) {
		if (
			!isset($config['framework']) ||
			!in_array(strtolower($config['framework']), $this->valid)
		) {
			throw new InvalidArgumentException("Missing or invalid 'framework' key in config");
		}
		$this->framework = strtolower($config['framework']);
		$this->options = array_diff_key($config, array('framework' => true));
	}

	public function runner() {
		$framework = 'TestJs' . ucfirst($this->framework);
		return new TestJsRunner(new $framework($this->options));
	}
}

