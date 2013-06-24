<?php

App::uses('TestJsAppController', 'TestJs.Controller');
App::uses('TestJsFactory', 'TestJs.Lib/TestJs');

class TestJsController extends TestJsAppController {
	public $layout = 'TestJs.test_js';
	public $autoRender = false;

	public function index() {
		$this->render('Pages/test');
	}

	public function beforeRender() {
		$defaults = array(
			'framework' => 'mocha',
			'chai' => 'expect' 
		);
		$opts = Configure::read('TestJs');
		if (!is_array($opts)) {
			$opts = $defaults;
		}
		$factory = new TestJsFactory($opts);
		$this->set('testJs', $factory->runner());
	}
}
