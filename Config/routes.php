<?php

Router::connect('/testjs', array(
	'plugin'     => 'TestJs',
	'controller' => 'TestJs',
	'action'     => 'index'
));
