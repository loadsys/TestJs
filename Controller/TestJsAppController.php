<?php

App::uses('AppController', 'Controller');

class TestJsAppController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		if (isset($this->Auth)) {
			$this->Auth->allow('index');
		}
	}
}
