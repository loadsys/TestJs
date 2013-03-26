<?php

App::uses('TestJsAppController', 'TestJs.Controller');

class TestJsController extends TestJsAppController {
	public $layout = 'TestJs.test_js';
	public $autoRender = false;

	public function index() {
		$this->render('Pages/test');
	}
}
