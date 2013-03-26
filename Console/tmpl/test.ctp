<?php

// Include the app files that will be tested
$this->start('app_js');
	echo $this->Html->script('filename');
$this->end();

// Include the test files that contain the mocha, chai, sinon code
$this->start('test_js');
	echo $this->Html->script('filename_spec');
$this->end();