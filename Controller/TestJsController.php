<?php

App::uses('TestJsAppController', 'TestJs.Controller');

class TestJsController extends TestJsAppController {
	public $layout = 'TestJs.test_js';
	public $autoRender = false;

	public function index() {
		$this->render('Pages/test');
	}

	public function beforeRender() {
		$defaults = array('assert' => false, 'expect' => true, 'should' => false);
		$opts = Configure::read('TestJs');
		if (!is_array($opts)) {
			Configure::write('TestJs', $defaults);
		}
	}
}
