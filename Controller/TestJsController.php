<?php

App::uses('TestJsAppController', 'TestJs.Controller');
App::uses('TestJsRunner', 'TestJs.Lib');

class TestJsController extends TestJsAppController {
	public $layout = 'TestJs.test_js';
	public $autoRender = false;

	public function index() {
		$this->render('Pages/test');
	}

	public function beforeRender() {
		$defaults = array(
			'mocha' => true,
			'qunit' => false,
			'jasmine' => false,
			'chai' => 'expect' 
		);
		$opts = Configure::read('TestJs');
		if (!is_array($opts)) {
			$opts = $defaults;
		}
		$this->set('testJs', new TestJsRunner($opts));
	}
}
