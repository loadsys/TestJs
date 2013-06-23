<?php

class TestJsJasmine {
	public function jsFiles() {
		return array('sinon.js', 'jasmine.js', 'jasmine-sinon.js', 'jasmine-html.js');
	}

	public function cssFiles() {
		return array('jasmine.css');
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

