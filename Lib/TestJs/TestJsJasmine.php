<?php

App::uses('TestJsFramework', 'TestJs.Lib/TestJs');

class TestJsJasmine extends TestJsFramework {
	public function jsFiles() {
		return array(
			'/test_js/js/jasmine.js',
			'/test_js/js/jasmine-html.js'
		);
	}

	public function cssFiles() {
		return array('/test_js/css/jasmine.css');
	}

	public function startup() {
		return "<script>(function() {
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
})();</script>";
	}
}

