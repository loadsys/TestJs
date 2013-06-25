<?php

App::uses('TestJsAppController', 'TestJs.Controller');
App::uses('TestJsBuilder', 'TestJs.Lib/TestJs');

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
		$builder = new TestJsBuilder($opts);
		$this->set('testJs', $builder->runner());
	}
}
