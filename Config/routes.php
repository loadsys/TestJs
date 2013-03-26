<?php

if (Configure::read('debug') !== 0) {
	Router::connect('/testjs', array(
		'plugin'     => 'TestJs',
		'controller' => 'TestJs',
		'action'     => 'index'
	));
}
