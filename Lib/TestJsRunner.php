<?php

class TestJsRunner {
	protected $conf = array();
	protected $defaults = array(
		'jasmine' => false,
		'qunit'   => false,
		'mocha'   => false,
		'chai'    => false
	);

	protected $filesFor = array(
		'mocha' => array(
			'chai.js',
			'sinon.js',
			'sinon-chai.js',
			'mocha.js'
		),
		'qunit' => array(
			'sinon.js',
			'qunit.js',
			'qunit-sinon.js'
		),
		'jasmine' => array(
			'sinon.js',
			'jasmine.js',
			'jasmine-sinon.js',
			'jasmine-html.js'
		)
	);

	protected $chaiTypes = array('expect', 'should', 'assert');

	public function __construct($conf = array()) {
		$this->conf = $conf + $this->defaults;
	}

	public function jsFiles() {
		$framework = $this->whichFramework();
		$return = array();
		if (isset($this->filesFor[$framework])) {
			$return = $this->filesFor[$framework];
		}
		return $return;
	}

	public function cssFiles() {
		$file = $this->whichFramework();
		return array("$file.css");
	}

	public function extras() {
		return $this->wrapInScriptTag($this->runFrameworkMethod('extras'));
	}

	public function runner() {
		return $this->wrapInScriptTag($this->runFrameworkMethod('runner'));
	}

	public function markup() {
		return $this->runFrameworkMethod('markup');
	}

	private function runFrameworkMethod($suffix) {
		$framework = $this->whichFramework();
		$fixedWord = ucfirst($suffix);
		$method = "{$framework}{$fixedWord}";
		$return = array();
		if (method_exists($this, $method)) {
			$return = $this->$method();
		}
		return $return;
	}

	private function wrapInScriptTag($lines = array()) {
		$script = '<script>%s</script>';
		return join("\n", array_map(function($element) use ($script) {
			return sprintf($script, $element);
		}, $lines));
	}

	private function whichFramework() {
		$framework = null;
		switch (true) {
			case $this->conf['mocha']:
				$framework = 'mocha';
				break;
			case $this->conf['qunit']:
				$framework = 'qunit';
				break;
			case $this->conf['jasmine']:
				$framework = 'jasmine';
				break;
		}
		return $framework;
	}

	private function qunitExtras() {
		return array();
	}

	private function jasmineExtras() {
		return array();
	}

	private function mochaExtras() {
		$chai = 'expect';
		$assert = '';
		if ($this->conf['chai'] && in_array($this->conf['chai'], $this->chaiTypes)) {
			$chai = $this->conf['chai'];
		}
		switch ($chai) {
			case 'assert':
				$assert = "window.assert = chai.assert;";
				break;
			case 'expect':
				$assert = "window.expect = chai.expect;";
				break;
			case 'should':
				$assert = "chai.should();";
				break;
		}
		return array($assert, "mocha.setup('bdd');");
	}

	private function qunitRunner() {
		return array();
	}

	private function jasmineRunner() {
		return array("(function() {
  var jasmineEnv = jasmine.getEnv();
  jasmineEnv.updateInterval = 1000;
  
  var htmlReporter = new jasmine.HtmlReporter();
  
  jasmineEnv.addReporter(htmlReporter);
  
  jasmineEnv.specFilter = function(spec) {
    return htmlReporter.specFilter(spec);
  };
  
  var currentWindowOnload = window.onload;
  window.onload = function() {
  	if (currentWindowOnload) {
  		currentWindowOnload();
  	}
  	execJasmine();
  };
  
  function execJasmine() {
    jasmineEnv.execute();
  }
})();");
	}

	private function mochaRunner() {
		return array("if (window.mochaPhantomJS) { mochaPhantomJS.run(); } else { mocha.run(); }");
	}

	private function qunitMarkup() {
		return "<div id=\"qunit\"></div>\n<div id=\"qunit-fixture\"></div>";
	}

	private function jasmineMarkup() {
		return '';
	}

	private function mochaMarkup() {
		return '<div id="mocha"></div>';
	}
}

